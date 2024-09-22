<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Topic;
use App\Traits\Common;

class TestimonialController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::get();
    
        return view('admin.testimonials', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('admin.add_testimonial'); 
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'content' => 'required|string',
        'published' => 'nullable|boolean',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);
    if ($request->hasFile('image')) {
        $data['image'] = $this->uploadFile($request->image, 'assests/images/testimonials');
    }
    Testimonial::create($data);

    return redirect()->route('admin.testimonials')->with('success', 'Testimonial created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {

    $testimonial = Testimonial::get();

    return view('admin.testimonials', compact('testimonial'));
}
       

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
{
    $testimonial = Testimonial::findOrFail($id);
    return view('admin.edit_testimonial', compact('testimonial'));
}

public function update(Request $request, $id)

  {  $testimonial = Testimonial::findOrFail($id);
    
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'content' => 'required|string',
        'published' => 'nullable|boolean',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);
    
    if ($request->hasFile('image')) {
        $data['image'] = $this->uploadFile($request->image, 'assests/images/testimonials');
    }
    $testimonial->update($data);

    return redirect()->route('admin.testimonials')->with('success', 'Testimonial updated successfully!');
  }
public function destroy(Testimonial $testimonial)
{
    $testimonial->delete();

    return redirect()->route('admin.testimonials.index')->with('success', 'testimonial deleted successfully!');
}

public function showDeleted()
{
    $deletedtestimonials = Testimonial::onlyTrashed()->get();
    return view('admin.categories.deleted', compact('deletedtestimonials'));
}

public function restore(Testimonial $testimonial)
{
    $testimonial->restore();

    return redirect()->route('admin.testimonials.index')->with('success', 'testimonial restored successfully!');
}

public function forceDelete(Testimonial $testimonial)
{
    $testimonial->forceDelete();

    return redirect()->route('admin.testimonials.index')->with('success', 'testimonial deleted permanently!');
}
}
