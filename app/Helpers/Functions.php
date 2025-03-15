<?php

namespace App\Helpers;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Functions 
{
    /**
     * This method take two args to get a specific 
     * set functions to be used across the project.
     *
     * 
     * @param object \Illuminate\Http\Request $request
     * @param string $key
     *
     * @return object
     */

    public function uploadImage($image, $folder)
    {
       return Cloudinary()->upload($image->getRealPath(), [
            'folder' => $folder,
            'public_id' => $this->removeExtension($image->getClientOriginalName()),
        ])->getSecurePath();
    }

    public static function uploadMultipleImages($images, $folder)
    {
        // Array of Base64 images
        $uploadedImages = [];

        // Ensure input is an array
        if (!is_array($images)) {
            return response()->json(['error' => 'Invalid input, expected an array of images'], 400);
        }

        foreach ($images as $image) {
            try {
                // Upload each image to Cloudinary
                $uploadedFile = Cloudinary::upload($image, [
                    'folder' => $folder 
                ]);

                // Store the secure URL
                $uploadedImages[] = $uploadedFile->getSecurePath();
            } catch (\Exception $e) {
                return response()->json(['error' => 'Failed to upload image', 'message' => $e->getMessage()], 500);
            }
        }

        return  $uploadedImages;
        
    }

    public function removeExtension($filename) 
    {
        return pathinfo($filename, PATHINFO_FILENAME);
    }

    public static function formatPhoneNumber($phone_number)
    {
        return preg_replace("/(\d{3})(\d{3})(\d{4})/", '($1)-$2-$3', $phone_number);
    }

    public static function generateRandomString($prefix, $length = 10) 
    {
        return $prefix."-".substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public function deleteImageByUrl($url)
    {
        // Extract public ID from the URL
        $publicId = $this->getPublicIdFromUrl($url);

        try {
            // Call Cloudinary API to delete the image using the public ID
            $result = Cloudinary::destroy($publicId);

            return true;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

     // Helper function to extract public ID from the Cloudinary URL
     private function getPublicIdFromUrl($url)
     {

         // Cloudinary URL format: https://res.cloudinary.com/{cloud_name}/image/upload/v{version}/{folder}/{public_id}.{extension}
        $pattern = '/\/upload\/(?:v\d+\/)?(.+?)\.[a-zA-Z]+$/';

        preg_match($pattern, $url, $matches);

        return $matches[1] ?? null; // Return public ID or null if not found
 
     }
} 
