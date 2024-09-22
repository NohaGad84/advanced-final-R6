<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Traits\Common;

class TopicController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $categories = Category::with('topics')->get();
        $topics = Topic::with('category')->get();

        $topics = Topic::withTrashed()->get();
        return view('admin.topics', compact('topics')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
   
    {
        $categories = Category::select('id','category_name')->get();
        return view('admin.add_topic',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([

        'topic_title' => 'required|string', 
        'content' => 'required|string|max:500',
        'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required|exists:categories,id',
    ]);
        $data['trending']= isset($request->trending);
        $data['published']= isset($request->published);
        $data['image'] = $this->uploadFile($request->image, 'assests/images/topics');

        Topic::create($data);
        return redirect()->route('admin.topics.index');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
                // dd($topic);

        $topic = Topic::with('category')->findOrFail($id);
        return view('admin.topic_details',compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    
{
        $categories = Category::select('id','category_name')->get();
        $topic = Topic::findOrfail($id);

        return view('admin.edit_topic',compact('topic','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request,$id);
        $data = $request->validate([
            'topic_title'=> 'required|string',
            'content'=> 'required|string',
            'image' =>'sometimes|mimes:png,jpg,jpeg|max:2048',
            'category_id'=> 'required|integer|exists:categories,id',

        ]);
        $data['trending']= isset($request->trending);
        $data['published']= isset($request->published);
       
        if($request->hasFile('image')){
         $data['image'] = $this->uploadFile($request->image,'assests/images/topics');
        }
       Topic::where('id',$id)->update($data);
       return redirect()->route('admin.topics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Topic $topic)
   {
       $topic->delete();

       return redirect()->route('admin.topics.index')->with('success', 'Topic deleted successfully!');
   }

   public function showDeleted()
   {
       $deletedTopics = Topic::onlyTrashed()->get(); 

       return view('admin.topics.deleted', compact('deletedTopics'));
   }

   public function restore(Topic $topic)
   {
       $topic->restore();

       return redirect()->route('admin.topics.index')->with('success', 'Topic restored successfully!');
   }

   public function forceDelete(Topic $topic)
   {
       $topic->forceDelete();

       return redirect()->route('admin.topics.index')->with('success', 'Topic permanently deleted!');
   }
}
