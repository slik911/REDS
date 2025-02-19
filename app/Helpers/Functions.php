<?php

namespace App\Helpers;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

            
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

    public function removeExtension($filename) 
    {
        return pathinfo($filename, PATHINFO_FILENAME);
    }

    public static function formatPhoneNumber($phone_number)
    {
        return preg_replace("/(\d{3})(\d{3})(\d{4})/", '($1)-$2-$3', $phone_number);
    }
} 
