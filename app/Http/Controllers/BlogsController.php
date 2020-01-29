<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class BlogsController extends Controller
{
    public function index(){
        $blogs = Blog::latest()->get();
        return view('blogs.index', ['blogs'=> $blogs]);
    }

    public function create(){
        $categories = Category::latest()->get();
        return view('blogs.create', ['categories'=> $categories]);
    }

    public function store(Request $request){
        $input = $request->all();
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
        return view('blogs.edit', ['blog'=> $blog, 'categories'=>$categories]);
    }

    public function update(Request $request, $id){
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
