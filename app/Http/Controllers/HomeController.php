<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Menampilkan daftar konten
    public function index()
    {
        $homes = Home::all();
        return view('home.index', compact('homes'));
    }

    public function rentcar()
    {
        $homes = Home::all();
        return view('rentcar', compact('homes'));
    }

    public function create()
    {
        return view('home.create');
    }

    // Menyimpan konten baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Home::create($request->all());

        return redirect()->route('home.index')->with('success', 'Home created successfully.');
    }

    // Menampilkan form untuk mengedit home
    public function edit(Home $home)
    {
        return view('home.edit', compact('home'));
    }

    // Menyimpan perubahan Home
    public function update(Request $request, Home $home)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $home->update($request->all());

        return redirect()->route('home.index')->with('success', 'Home updated successfully.');
    }

    // Menghapus Home
    public function destroy(Home $home)
    {
        $home->delete();

        return redirect()->route('home.index')->with('success', 'Home deleted successfully.');
    }
}