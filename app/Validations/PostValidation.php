<?php

namespace App\Validations;
        
use Illuminate\Support\Facades\Validator;
            
class PostValidation 
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
                "title" => "string|required|max:50|unique:posts,title",
                "description" => "string|required",
                'images' => 'required',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            "update" => [
                "title" => "string|required|max:50|unique:posts,title,".$request->post_id.",uuid",
                "description" => "string|required",
                'images' => 'nullable',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        ][$key]);
    }
}