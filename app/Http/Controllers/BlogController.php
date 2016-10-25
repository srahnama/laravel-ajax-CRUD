<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Blog;
use validator;
use response;

class BlogController extends Controller
{
    public function index(){
    	$blogs = Blog::all();

    	return view('blog.index',['blogs'=>$blogs]);
    }

public function editItem(Request $req){
	$blog = Blog::find($req->id);
	$blog->title = $req->title;
	$blog->description = $req->description;
	$blog->save();
	return response()->json($blog);

}






    }
