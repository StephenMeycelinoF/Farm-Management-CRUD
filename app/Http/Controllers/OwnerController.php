<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OwnerController extends Controller
{
    public function count()
    {
        $totalOwners = Owner::count(); 
        return response()->json([
            'status' => 200,
            'totalOwners' => $totalOwners
        ]);
    }
    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $ownerData = $request->only(['name', 'address', 'phone']);
        Owner::create($ownerData);

        return response()->json([
            'status' => 200,
            'message' => 'Owner created successfully'
        ]);
    }

    public function getall()
    {
        $owners = Owner::all();
        return response()->json([
            'status' => 200,
            'owners' => $owners
        ]);
    }

    public function edit($id)
    {
        $owner = Owner::find($id);

        if ($owner) {
            return response()->json([
                'status' => 200,
                'owner' => $owner
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Owner not found'
            ]);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:owners,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $owner = Owner::find($request->id);

        if ($owner) {
            $owner->update($request->only(['name', 'address', 'phone']));
            return response()->json([
                'status' => 200,
                'message' => 'Owner updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Owner not found'
            ]);
        }
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:owners,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $owner = Owner::find($request->id);

        if ($owner && $owner->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Owner deleted successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Failed to delete owner.'
            ]);
        }
    }
}
