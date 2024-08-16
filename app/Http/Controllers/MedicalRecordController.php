<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicalRecordController extends Controller
{
    public function count()
    {
        $totalRecords = MedicalRecord::count();
        return response()->json([
            'status' => 200,
            'totalRecords' => $totalRecords
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'animal_id' => 'required|exists:animals,id',
            'date' => 'required|date',
            'description' => 'required|string|max:255',
            'treatment' => 'nullable|string|max:500',
            'veterinarian' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $record = MedicalRecord::create($request->only(['animal_id', 'date', 'description', 'treatment', 'veterinarian']));
        return response()->json([
            'status' => 200,
            'message' => 'Medical record created successfully'
        ]);
    }


    public function getall()
    {
        $records = MedicalRecord::with('animal')->get();
        return response()->json([
            'status' => 200,
            'medicalRecords' => $records
        ]);
    }


    public function edit($id)
    {
        $record = MedicalRecord::find($id);
        if ($record) {
            return response()->json([
                'status' => 200,
                'medicalRecord' => $record
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Medical record not found'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'animal_id' => 'required|exists:animals,id',
            'date' => 'required|date',
            'description' => 'required|string|max:255',
            'treatment' => 'nullable|string|max:500',
            'veterinarian' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $record = MedicalRecord::find($id);
        if (!$record) {
            return response()->json([
                'status' => 404,
                'message' => 'Record not found'
            ], 404);
        }

        $record->update($request->only(['animal_id', 'date', 'description', 'treatment', 'veterinarian']));
        return response()->json([
            'status' => 200,
            'message' => 'Medical record updated successfully'
        ]);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:medical_records,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $record = MedicalRecord::find($request->id);
        if ($record && $record->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Medical record deleted successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Failed to delete medical record.'
            ]);
        }
    }
}
