<?php

namespace App\Validations;

use Illuminate\Support\Facades\Validator;

class QuotationValidation
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
            'client_uuid' => 'required|exists:clients,uuid',
            'rfq_id' => 'nullable ',
            'quote_number' => 'required|unique:quotations,quote_number',
            'phone_number' => 'required',
            'services' => 'required|array',  // Ensure 'service' is an array
            'services.*' => 'string|required',  // Each element in 'service' should be a non-empty string
            'description' => 'required|array',  // Ensure 'description' is an array
            'description.*' => 'string|required',  // Each description should be a non-empty string
            'unit_price' => 'required|array',  // Ensure 'unit_price' is an array
            'unit_price.*' => 'numeric|required',  // Each unit_price should be numeric and required
            'quantity' => 'required|array',  // Ensure 'quantity' is an array
            'quantity.*' => 'integer|required',  // Each quantity should be an integer and required
            'total' => 'required|array',  // Ensure 'total' is an array
            'total.*' => 'numeric|required',
            ],
             "update" => [
            'client_uuid' => 'required|exists:clients,uuid',
            'rfq_id' => 'nullable ',
            'quote_number' => 'required|unique:quotations,quote_number,'.$request->uuid.',uuid',
            'phone_number' => 'required',
            'services' => 'required|array',  // Ensure 'service' is an array
            'services.*' => 'string|required',  // Each element in 'service' should be a non-empty string
            'description' => 'required|array',  // Ensure 'description' is an array
            'description.*' => 'string|required',  // Each description should be a non-empty string
            'unit_price' => 'required|array',  // Ensure 'unit_price' is an array
            'unit_price.*' => 'numeric|required',  // Each unit_price should be numeric and required
            'quantity' => 'required|array',  // Ensure 'quantity' is an array
            'quantity.*' => 'integer|required',  // Each quantity should be an integer and required
            'total' => 'required|array',  // Ensure 'total' is an array
            'total.*' => 'numeric|required',
            ]
        ][$key]);
    }
}
