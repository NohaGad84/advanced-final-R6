<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;

use App\Models\Testimonial;
use App\Models\FAQ;

class PublicController extends Controller
{
    public function index()
{
    $topics = Topic::where('published', 1)->limit(2)->get();
        $categories = Category::get();
        $testimonials = Testimonial::where('published', 1)->limit(3)->get();
        return view('public.index', compact('testimonials', 'topics', 'categories'));
        
}
public function contact()
{

    return view('public.contact');
}
public function testimonials(Request $request)
{
    $testimonials = Testimonial::where('published', 1)->get(); 

    
    return view('public.testimonials', compact('testimonials'));
}
 

public function topicDetails(Request $request,$id)
{
    $topic = Topic::with('category')->findOrFail($id);

    if (!$topic) {
        abort(404, 'Topic not found');
    }
    

    return view('public.topics-detail', compact('topic'));
}

// public function faqs()
// {
//     $faqs = Faq::all(); 
//     return view('public.index', compact('faqs'));
// }


public function Topicslist()
{
    $topics = Topic::where('published', 1)->limit(6)->get(); 

    return view('public.topics-listing', compact('topics'));
}



}
    

    
   

