<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEducationRequest;
use App\Models\Education;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Store Education (AJAX)
    |--------------------------------------------------------------------------
    */

    public function store(StoreEducationRequest $request)
    {
        try {

            $employee = Auth::user()->employee;

            if (!$employee) {

                return response()->json([
                    'status' => false,
                    'message' => 'Please create your profile first.',
                    'redirect' => route('employee.profile.create'),
                ], 422);

            }

            $data = $request->validated();

            if ($request->hasFile('document_file')) {

                $data['document_file'] = $request->file('document_file')
                    ->store('employees/documents', 'public');

            }

            $education = $employee->educations()->create($data);

            return response()->json([
                'status' => true,
                'message' => 'Education record added successfully.',
                'education' => $education,
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);

        }
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Education (AJAX)
    |--------------------------------------------------------------------------
    */

    public function destroy(Education $education)
    {
        try {

            $employee = Auth::user()->employee;

            if (!$employee || $education->employee_id != $employee->id) {

                return response()->json([
                    'status' => false,
                    'message' => 'Unauthorized action.',
                ], 403);

            }

            if (
                $education->document_file &&
                Storage::disk('public')->exists($education->document_file)
            ) {
                Storage::disk('public')->delete($education->document_file);
            }

            $education->delete();

            return response()->json([
                'status' => true,
                'message' => 'Education record deleted successfully.',
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);

        }
    }
}