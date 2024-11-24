<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    // public function rentcar()
    // {
    //     $cars = Car::all(); 
    //     return view('rentcar', compact('cars'));
    // }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|string', 
            'borrowed_at' => 'nullable|date', 
            'returned_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('cars', 'public');
        }

        Car::create($validated);
        return redirect()->route('cars.index')->with('success', 'Car created successfully.');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id); 
        return view('cars.edit', compact('car', 'id')); 
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|string',
            'borrowed_at' => 'nullable|date',
            'returned_at' => 'nullable|date',
        ]);

        $car->title = $validated['title'];
        $car->description = $validated['description'];
        $car->category = $validated['category'];
        $car->status = $validated['status'];
        
        $car->borrowed_at = $validated['borrowed_at'] ? \Carbon\Carbon::parse($validated['borrowed_at'])->format('Y-m-d') : null;
        $car->returned_at = $validated['returned_at'] ? \Carbon\Carbon::parse($validated['returned_at'])->format('d-m-Y') : null;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('cars', 'public');
        }

        $car->update($validated);
        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        if ($car->image) {
            Storage::delete('public/' . $car->image);
        }

        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }

    public function filterByCategory($category)
    {
        if ($category === 'all') {
            $cars = Car::all();
        } else {
            $cars = Car::where('category', $category)->get();
        }

        return response()->json($cars);
    }

}

