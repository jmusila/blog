<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class BlogsController extends Controller
{
    public function index(){
        $blogs = Blog::where('status', 1)->latest()->get();
        // $blogs = Blog::latest()->get();
        return view('blogs.index', ['blogs'=> $blogs]);

    }

    public function create(){
        $categories = Category::latest()->get();
        return view('blogs.create', ['categories'=> $categories]);
    }

    public function store(Request $request){
        $input = $request->all();
        //meta stuff
        $input['slug'] = Str::slug($request->title);
        $input['meta_title'] = Str::limit($request->title, 55);
        $input['meta_description'] = Str::limit($request->body, 155, ' (...)');
        
        //image upload
        if ($file = $request->file('featured_image')) {
            $name = uniqid().$file->getClientOriginalName();
            $file->move('images/featured_image/', $name);
            $input['featured_image'] = $name;
        }

        $blog = Blog::create($input);
        // sync with categories
        if ($request->category_id) {
            $blog->category()->sync($request->category_id);
        }
        return redirect('/blogs');
    }

    public function show($id){
        $blog = Blog::findOrFail($id);
        return view('blogs.show', ['blog'=> $blog]);
    }

    public function edit($id){
        $categories = Category::latest()->get();
        $blog = Blog::findOrFail($id);

        $bc = array();
        foreach($blog->category as $c) {
            $bc[] = $c->id-1;
        }
        $filtered = Arr::except($categories, $bc);

        return view('blogs.edit', ['blog'=> $blog, 'categories'=>$categories, 'filtered'=>$filtered]);
    }

    public function update(Request $request, $id){
        // dd($request->status);
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($input);

        // sync categories
        if ($request->category_id) {
            $blog->category()->sync($request->category_id);
        }
        return redirect('blogs');
    }

    public function delete(Request $request, $id){
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect('blogs');
    }

    public function trash(){
        $trashedBlogs = Blog::onlyTrashed()->get();
        return view('blogs.trash', ['trashedBlogs'=> $trashedBlogs]);
    }

    public function restore($id){
        $restoredBlog = Blog::onlyTrashed()->findOrFail($id);
        $restoredBlog->restore($restoredBlog);
        return redirect('blogs');
    }

    public function permanentDelete($id){
        $permanentDeleteBlog = Blog::onlyTrashed()->findOrFail($id);
        $permanentDeleteBlog->forceDelete($permanentDeleteBlog);
        return back();
    }

}
