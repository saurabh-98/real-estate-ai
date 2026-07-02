<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation Rules
     */
    public function rules(): array
    {
        $employeeId = Auth::user()->employee->id;

        return [

            /*
            |--------------------------------------------------------------------------
            | Employee Profile
            |--------------------------------------------------------------------------
            */

            'full_name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('employees', 'email')->ignore($employeeId),
            ],

            'phone_number' => [
                'required',
                'string',
                'max:20'
            ],

            'date_of_birth' => [
                'required',
                'date',
                'before:today'
            ],

            'gender' => [
                'required',
                'in:male,female,other'
            ],

            'address_line_1' => [
                'required',
                'string',
                'max:255'
            ],

            'address_line_2' => [
                'nullable',
                'string',
                'max:255'
            ],

            'city' => [
                'required',
                'string',
                'max:100'
            ],

            'state' => [
                'required',
                'string',
                'max:100'
            ],

            'pincode' => [
                'required',
                'string',
                'max:10'
            ],

            'country' => [
                'required',
                'string',
                'max:100'
            ],

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048'
            ],

            /*
            |--------------------------------------------------------------------------
            | Education
            |--------------------------------------------------------------------------
            */

            'certificate_name' => [
                'required',
                'array',
                'min:1'
            ],

            'certificate_name.*' => [
                'required',
                'string',
                'max:255'
            ],

            'institute_name' => [
                'required',
                'array'
            ],

            'institute_name.*' => [
                'required',
                'string',
                'max:255'
            ],

            'year_of_completion' => [
                'required',
                'array'
            ],

            'year_of_completion.*' => [
                'required',
                'digits:4',
                'integer',
                'min:1950',
                'max:' . date('Y')
            ],

            'document_file' => [
                'nullable',
                'array'
            ],

            'document_file.*' => [
                'nullable',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:5120'
            ],

        ];
    }

    /**
     * Custom Validation Messages
     */
    public function messages(): array
    {
        return [

            'full_name.required' => 'Full name is required.',

            'email.required' => 'Email is required.',

            'phone_number.required' => 'Phone number is required.',

            'date_of_birth.required' => 'Date of birth is required.',

            'gender.required' => 'Gender is required.',

            'address_line_1.required' => 'Address Line 1 is required.',

            'city.required' => 'City is required.',

            'state.required' => 'State is required.',

            'pincode.required' => 'Pincode is required.',

            'country.required' => 'Country is required.',

            'certificate_name.required' => 'Please add at least one education record.',

            'certificate_name.*.required' => 'Certificate name is required.',

            'institute_name.*.required' => 'Institute name is required.',

            'year_of_completion.*.required' => 'Year of completion is required.',

            'year_of_completion.*.digits' => 'Year of completion must contain exactly 4 digits.',

            'document_file.*.mimes' => 'Certificate must be PDF, JPG, JPEG or PNG.',

            'document_file.*.max' => 'Certificate file size must not exceed 5 MB.',

            'profile_photo.image' => 'Profile photo must be an image.',

        ];
    }

    /**
     * Friendly Attribute Names
     */
    public function attributes(): array
    {
        return [

            'full_name' => 'Full Name',

            'phone_number' => 'Phone Number',

            'date_of_birth' => 'Date of Birth',

            'address_line_1' => 'Address Line 1',

            'address_line_2' => 'Address Line 2',

            'certificate_name.*' => 'Certificate Name',

            'institute_name.*' => 'Institute Name',

            'year_of_completion.*' => 'Year of Completion',

            'document_file.*' => 'Certificate File',

        ];
    }
}