<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Show Create Form
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        if (Auth::user()->employee) {

            return redirect()->route('employee.profile.show');

        }

        return view('employee.profile.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Employee Profile + Education
    |--------------------------------------------------------------------------
    */

    public function store(StoreProfileRequest $request)
    {
        DB::beginTransaction();

        try {

            if (Auth::user()->employee) {

                return response()->json([
                    'status'  => false,
                    'message' => 'Employee profile already exists.'
                ], 422);

            }

            /*
            |--------------------------------------------------------------------------
            | Employee Profile
            |--------------------------------------------------------------------------
            */

            $data = $request->validated();

            if ($request->hasFile('profile_photo')) {

                $data['profile_photo'] = $request->file('profile_photo')
                    ->store('employees/photos', 'public');

            }

            $data['user_id'] = Auth::id();

            $employee = Auth::user()->employee()->create($data);

            /*
            |--------------------------------------------------------------------------
            | Education Records
            |--------------------------------------------------------------------------
            */

            if ($request->filled('certificate_name')) {

                foreach ($request->certificate_name as $index => $certificateName) {

                    $document = null;

                    if (
                        $request->hasFile('document_file') &&
                        isset($request->file('document_file')[$index])
                    ) {

                        $document = $request
                            ->file('document_file')[$index]
                            ->store('employees/documents', 'public');

                    }

                    $employee->educations()->create([

                        'certificate_name' => $certificateName,

                        'institute_name' => $request->institute_name[$index] ?? null,

                        'year_of_completion' => $request->year_of_completion[$index] ?? null,

                        'document_file' => $document,

                    ]);

                }

            }

            DB::commit();

            return response()->json([

                'status' => true,

                'message' => 'Employee profile created successfully.',

                'redirect' => route('employee.profile.show'),

            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            if (
                isset($data['profile_photo']) &&
                Storage::disk('public')->exists($data['profile_photo'])
            ) {

                Storage::disk('public')->delete($data['profile_photo']);

            }

            return response()->json([

                'status' => false,

                'message' => $e->getMessage(),

            ], 500);

        }
    }

        /*
    |--------------------------------------------------------------------------
    | Show Profile
    |--------------------------------------------------------------------------
    */

    public function show()
    {
        $employee = Auth::user()->employee;

        if (!$employee) {

            return redirect()->route('employee.profile.create');

        }

        $employee->load('educations');

        return view('employee.profile.show', compact('employee'));
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Profile
    |--------------------------------------------------------------------------
    */

    public function edit()
    {
        $employee = Auth::user()->employee;

        if (!$employee) {

            return redirect()->route('employee.profile.create');

        }

        $employee->load('educations');

        return view('employee.profile.edit', compact('employee'));
    }

    /*
    |--------------------------------------------------------------------------
    | Update Profile + Education
    |--------------------------------------------------------------------------
    */

    public function update(UpdateProfileRequest $request)
    {
        DB::beginTransaction();

        try {

            $employee = Auth::user()->employee;

            if (!$employee) {

                return response()->json([
                    'status' => false,
                    'message' => 'Employee profile not found.'
                ], 404);

            }

            $data = $request->validated();

            /*
            |--------------------------------------------------------------------------
            | Replace Profile Photo
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('profile_photo')) {

                if (
                    $employee->profile_photo &&
                    Storage::disk('public')->exists($employee->profile_photo)
                ) {

                    Storage::disk('public')->delete($employee->profile_photo);

                }

                $data['profile_photo'] = $request->file('profile_photo')
                    ->store('employees/photos', 'public');

            }

            /*
            |--------------------------------------------------------------------------
            | Update Employee Profile
            |--------------------------------------------------------------------------
            */

            $employee->update($data);

            /*
            |--------------------------------------------------------------------------
            | Preserve Existing Education Records
            |--------------------------------------------------------------------------
            */

            $oldEducations = $employee->educations()->get()->values();

            /*
            |--------------------------------------------------------------------------
            | Delete Old Education Records Only
            |--------------------------------------------------------------------------
            */

            $employee->educations()->delete();

            /*
            |--------------------------------------------------------------------------
            | Save Updated Education Records
            |--------------------------------------------------------------------------
            */

            if ($request->filled('certificate_name')) {

                foreach ($request->certificate_name as $index => $certificateName) {

                    /*
                    |--------------------------------------------------------------------------
                    | Keep Old Certificate File
                    |--------------------------------------------------------------------------
                    */

                    $document = $oldEducations[$index]->document_file ?? null;

                    /*
                    |--------------------------------------------------------------------------
                    | Replace Certificate If New File Uploaded
                    |--------------------------------------------------------------------------
                    */

                    if (
                        $request->hasFile('document_file') &&
                        isset($request->file('document_file')[$index])
                    ) {

                        if (
                            $document &&
                            Storage::disk('public')->exists($document)
                        ) {

                            Storage::disk('public')->delete($document);

                        }

                        $document = $request->file('document_file')[$index]
                            ->store('employees/documents', 'public');

                    }

                    $employee->educations()->create([

                        'certificate_name'   => $certificateName,

                        'institute_name'     => $request->institute_name[$index] ?? null,

                        'year_of_completion' => $request->year_of_completion[$index] ?? null,

                        'document_file'      => $document,

                    ]);

                }

            }

            DB::commit();

            return response()->json([

                'status'   => true,

                'message'  => 'Profile updated successfully.',

                'redirect' => route('employee.profile.show'),

            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([

                'status'  => false,

                'message' => $e->getMessage(),

            ], 500);

        }
    }

}