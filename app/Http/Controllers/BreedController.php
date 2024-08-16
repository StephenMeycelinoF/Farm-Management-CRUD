<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BreedController extends Controller
{
    public function count()
    {
        $totalBreeds = Breed::count();
        return response()->json([
            'status' => 200,
            'totalBreeds' => $totalBreeds
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $breedData = $request->only(['name']);
        Breed::create($breedData);

        return response()->json([
            'status' => 200,
            'message' => 'Breed created successfully'
        ]);
    }

    public function getall()
    {
        $breeds = Breed::all();
        return response()->json([
            'status' => 200,
            'breeds' => $breeds
        ]);
    }

    public function edit($id)
    {
        $breed = Breed::find($id);
        if ($breed) {
            return response()->json([
                'status' => 200,
                'breed' => $breed
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Breed not found'
            ]);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:breeds,id',
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $breed = Breed::find($request->id);
        if ($breed) {
            $breed->update($request->only(['name']));
            return response()->json([
                'status' => 200,
                'message' => 'Breed updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Breed not found'
            ]);
        }
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:breeds,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $breed = Breed::find($request->id);
        if ($breed && $breed->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Breed deleted successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Failed to delete breed.'
            ]);
        }
    }
}
