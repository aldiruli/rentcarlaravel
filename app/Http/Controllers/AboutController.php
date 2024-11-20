<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('about.index', compact('abouts'));
    }

    public function create()
    {
        return view('about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        About::create($request->all());

        return redirect()->route('about.index')->with('success', 'About content created successfully!');
    }

    public function edit(About $about)
    {
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        $about->update($request->all());

        return redirect()->route('about.index')->with('success', 'About content updated successfully!');
    }

    public function destroy(About $about)
    {
        $about->delete();

        return redirect()->route('about.index')->with('success', 'About content deleted successfully!');
    }
}
