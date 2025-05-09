<?php

namespace App\Validations;

use Illuminate\Support\Facades\Validator;

class UserValidation
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
                "phone_number" => "string|required|max:15|min:10",
                "email" => "string|required|email|max:50|unique:users,email",
                "address" => "string|required",
                "province" => "string|required",
                "city" => "string|required",
                "postal_code" => "string|required|regex:/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/",
                "role" => "string|required",
                "image" => "nullable|image|mimes:jpeg,png,jpg,svg|max:2048",
            ],

            "update" => [
                "first_name" => "string|required|max:50",
                "last_name" => "string|required|max:50",
                "phone_number" => "string|required|max:15|min:10",
                "email" => "string|required|email|max:50|unique:users,email," . $request->id,
                "address" => "string|required",
                "province" => "string|required",
                "city" => "string|required",
                "postal_code" => "string|required|regex:/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/",
                "role" => "string|required",
                "image" => "nullable|image|mimes:jpeg,png,jpg,svg|max:2048",
            ],

            "update_password" => [
                "password" => "string|required|min:8|confirmed",
            ]
        ][$key]);
    }
}