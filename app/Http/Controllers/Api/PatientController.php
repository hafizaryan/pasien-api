<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;


class PatientController extends Controller
{
    public function index()
    {
        try {
            $patients = Patient::all();
            return response()->json([
                'success' => true,
                'data' => $patients
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch patients'
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $patient = Patient::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $patient
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Patient not found'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'nik' => 'required|numeric|digits:16',
                'address' => 'required|string',
                'phone' => 'required|numeric|digits_between:11,13'
            ]);

            $patient = Patient::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Patient created successfully',
                'data' => $patient
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create patient'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $patient = Patient::findOrFail($id);

            $validated = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'nik' => 'sometimes|required|numeric|digits:16',
                'address' => 'sometimes|required|string',
                'phone' => 'sometimes|required|numeric|digits_between:11,13'
            ]);

            $patient->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Patient updated successfully',
                'data' => $patient
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update patient'
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $patient = Patient::findOrFail($id);
            $patient->delete();

            return response()->json([
                'success' => true,
                'message' => 'Patient deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete patient'
            ], 500);
        }
    }
}
