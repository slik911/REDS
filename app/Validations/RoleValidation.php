<?php

namespace App\Validations;
        
use Illuminate\Support\Facades\Validator;
            
class RoleValidation 
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
                "name" => "string|required|unique:roles|max:50",
            ],
            "update" => [
                "name" => "string|required|max:50|unique:roles,name," . $request->uuid . ",uuid",
            ]
        ][$key]);
    }
}