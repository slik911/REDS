<?php

namespace App\Validations;
        
use Illuminate\Support\Facades\Validator;
            
class RentalValidation 
{
    /**
     * This method take two args to get a specific 
     * set of rules and validates it via the incoming request.
     *
     * @param object \Illuminate\Http\Request $request
     * @param string $key
     *
     * @return object
     */
    public function validationRules($request, $key) {
        return Validator::make($request->all(), [
            "create" => [
                "title" => "string|required|max:50",
                "description" => "string|required",
                "province" => "string|required",
                "city" => "string|required",
                "postal_code" => "string|required",
                'images' => 'required',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'features' => 'required',
                'features.*' => 'string',
            ],

            "update" => [
                "title" => "string|required|max:50",
                "description" => "string|required",
                "province" => "string|required",
                "city" => "string|required",
                "postal_code" => "string|required", 
                'images' => 'nullable',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'features' => 'required',
                'features.*' => 'string',
            ]
        ][$key]);
    }
}