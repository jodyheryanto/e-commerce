<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('cms.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('cms.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('banners', 'public');
        } else {
            $imagePath = null;
        }

        // Create new banner
        Banner::create([
            'title' => $request->input('title'),
            'image_path' => $imagePath,
            'description' => $request->input('description'),
        ]);

        return redirect()->route('cms.banner.index')->with('success', 'Banner created successfully.');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('cms.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        $banner = Banner::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($banner->image_path) {
                Storage::disk('public')->delete($banner->image_path);
            }
            $imagePath = $request->file('image')->store('banners', 'public');
            $banner->image_path = $imagePath;
        }

        // Update banner details
        $banner->title = $request->input('title');
        $banner->description = $request->input('description');
        $banner->save();

        return redirect()->route('cms.banner.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        // Delete image if exists
        if ($banner->image_path) {
            Storage::disk('public')->delete($banner->image_path);
        }
        $banner->delete();

        return redirect()->route('cms.banner.index')->with('success', 'Banner deleted successfully.');
    }
}
