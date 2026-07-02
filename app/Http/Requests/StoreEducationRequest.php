<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'certificate_name'    => ['required', 'string', 'max:255'],
            'institute_name'      => ['required', 'string', 'max:255'],
            'year_of_completion'  => ['required', 'digits:4', 'integer', 'min:1950', 'max:' . (date('Y') + 1)],
            'document_file'       => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
        ];
    }
}