<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use Illuminate\Support\Facades\Auth;

class HouseController extends Controller
{
    public function create()
    {
        return view('panel.pages.add-house-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'rooms' => 'required|integer|min:1',
        ]);

        $house = new House();
        $house->address = $request->address;
        $house->description = $request->description;
        $house->price = $request->price;
        $house->rooms = $request->rooms;
        $house->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('houses', 'public');
            $house->image = $imagePath;
        }

        $house->save();

        // Check if the user is an admin to decide where to redirect
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'House added successfully!');
        }

        return redirect()->route('panel.pages.home')->with('success', 'House submitted successfully!');
    }
}