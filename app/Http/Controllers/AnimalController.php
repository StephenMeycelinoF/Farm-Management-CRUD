<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnimalController extends Controller
{
    public function count()
    {
        $totalAnimals = Animal::count();
        return response()->json([
            'status' => 200,
            'totalAnimals' => $totalAnimals
        ]);
    }
    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'age' => 'required|integer',
            'description' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $animalData = $request->only(['name', 'species', 'age', 'description']);
        Animal::create($animalData);

        return response()->json([
            'status' => 200,
            'message' => 'Animal created successfully'
        ]);
    }

    public function getall()
    {
        $animals = Animal::all();
        return response()->json([
            'status' => 200,
            'animals' => $animals
        ]);
    }

    public function edit($id)
    {
        $animal = Animal::find($id);
        if ($animal) {
            return response()->json([
                'status' => 200,
                'animal' => $animal
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Animal not found'
            ]);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:animals,id',
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'age' => 'required|integer',
            'description' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $animal = Animal::find($request->id);
        if ($animal) {
            $animal->update($request->only(['name', 'species', 'age', 'description']));
            return response()->json([
                'status' => 200,
                'message' => 'Animal updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Animal not found'
            ]);
        }
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:animals,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $animal = Animal::find($request->id);
        if ($animal && $animal->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Animal deleted successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Failed to delete animal.'
            ]);
        }
    }
}
