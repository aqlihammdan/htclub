<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(request('keyword'));
        $workshops = Workshop::latest()->workshop()->paginate(5);
        $categories = Category::all();

        return view('admin.workshop.workshop', compact('workshops', 'categories'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.workshop.createWorkshop', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = User::count() + 1;
        $category_id = $request->post('category_id');
        $name = $request->post('name');
        $address = $request->post('address');
        $description = $request->post('description');

        $image = $request->file('image');
        $imageExtension = $image->getClientOriginalExtension();
        $imageName = $id . "_" . $request->post('name') . '.' . $imageExtension;
        Storage::disk('public_images')->put($imageName, File::get($image));

        $workshop = new Workshop;

        $workshop->users_id = Auth::id();
        $workshop->category_id = $category_id ?? null;
        $workshop->name = $name;
        $workshop->address = $address;
        $workshop->description = $description;
        $workshop->image = $imageName;
        $workshop->save();

        return redirect()->route('admin.workshop')->with('success', 'Bengkel rekomendasi berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Workshop $workshop)
    {
        return view('admin.workshop.showWorkshop', compact('workshop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workshop $workshop)
    {
        $categories = Category::all();
        return view('admin.workshop.editWorkshop', compact('workshop', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $category_id = $request->post('category_id');
        $name = $request->post('name');
        $address = $request->post('address');
        $description = $request->post('description');

        $workshop = Workshop::find($id);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = $id . "_" . $request->post('name') . '.' . $imageExtension;
            Storage::disk('public_images')->put($imageName, File::get($image));
            $workshop->image = $imageName;
        }

        $workshop->users_id = Auth::id();
        $workshop->category_id = $category_id ?? null;
        $workshop->name = $name;
        $workshop->address = $address;
        $workshop->description = $description;
        //$workshop->image = $imageName;
        $workshop->save();

        return redirect()->route('admin.workshop')->with('success', 'Bengkel rekomendasi berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workshop = Workshop::find($id)->delete();

        return response()->json($workshop);
    }
}
