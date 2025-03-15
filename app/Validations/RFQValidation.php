<?php

namespace App\Validations;
        
use Illuminate\Support\Facades\Validator;
            
class RFQValidation 
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
                "first_name" => "string|required|max:50",
                "last_name" => "string|required|max:50",
                "email" => "email|required|unique:clients,email",
                "phone_number" => "string|required|max:15|min:10",
                "address" => "string|required",
                "title" => "string|required",
                "description" => "string|required",
                "province" => "required",
                "city" => "required",
                "postal_code" => "required",
            ],
            "update" => [
                "name" => "string|required|max:50|unique:categories,name," . $request->uuid . ",uuid",
            ]
        ][$key]);
    }
}