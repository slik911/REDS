<?php

namespace App\Validations;
        
use Illuminate\Support\Facades\Validator;
            
class TestimonialValidation 
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
                "client_id" => "string|required|exists:clients,uuid",
                "message" => "string|required",
                
            ],
            "update" => [
                "client_id" => "string|required|exists:clients,uuid",
                "message" => "string|required",
            ]
        ][$key]);
    }
}