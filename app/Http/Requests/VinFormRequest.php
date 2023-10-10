<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VinFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cc' => 'required|regex:/^([A-Za-z0-9]{2})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/',
            'mmmmm' => 'required|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/',
            'pp' => 'required|size:6',
            'mmmm' => 'required|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/',
            'dd' => 'required|regex:/^[a-zA-Z0-9]{2} [a-zA-Z0-9]$/',
            'uu' => 'required|size:4|regex:/^[a-zA-Z0-9]{4}$/',
            'ee' => 'required|size:2|regex:/^[a-zA-Z0-9]{2}$/',
            'tt' => 'required|regex:/^[a-zA-Z0-9]{4} [a-zA-Z0-9]{2}$/',
        ];
    }

    public function messages(): array
    {
        return [
            'cc.required' => 'The Chassis Number is required.',
            'cc.regex' => 'The Chassis Number is invalid.',
            'mmmmm.required' => 'The M-Codes are required.',
            'mmmmm.regex' => 'The M-Codes are invalid.',
            'pp.required' => 'The Paint Code is required.',
            'pp.size' => 'The Paint Code is invalid.',
            'mmmm.required' => 'The M-Code is required.',
            'mmmm.regex' => 'The M-Code is invalid.',
            'dd.required' => 'The Production Date is required.',
            'dd.regex' => 'The Production Date is invalid.',
            'uu.required' => 'The Production Plant is required.',
            'uu.size' => 'The Production Plant is invalid.',
            'ee.required' => 'The Export Destination is required.',
            'ee.size' => 'The Export Destination is invalid.',
            'tt.required' => 'The Body Model (Engine & Gearbox) Type is required.',
            'tt.regex' => 'The Body Model (Engine & Gearbox) Type is invalid.',
        ];
    }
}
