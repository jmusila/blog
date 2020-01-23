<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogsController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('blogs.index', ['blogs'=> $blogs]);
    }

    public function create(){
        return view('blogs.create');
    }

    public function store(Request $request){
        $input = $request->all();
        $blog = Blog::create($input);
        return redirect('/blogs');
    }

    public function show($id){
        $blog = Blog::findOrFail($id);
        return view('blogs.show', ['blog'=> $blog]);
    }

    public function edit($id){
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', ['blog'=> $blog]);
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->update($input);
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