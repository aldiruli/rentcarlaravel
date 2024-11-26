<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\RentalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

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
            $originalName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            
            $filename = $originalName . '-rentcar.' . $extension;
    
            $path = $request->file('image')->storeAs('public/images', $filename);
    
            $validated['image'] = str_replace('public/', '', $path);
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
            $originalName = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $originalName . '-rentcar.' . $extension;
        
            $path = $request->file('image')->storeAs('public/images', $filename);
            $validated['image'] = str_replace('public/', '', $path);
        
            if ($car->image) {
                Storage::delete('public/' . $car->image);
            }
        }

        if ($car->status === 'rented' && $validated['status'] === 'available') {
            RentalHistory::create([
                'car_id' => $car->id,
                'borrowed_at' => $car->borrowed_at,
                'returned_at' => $car->returned_at,
            ]);
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

