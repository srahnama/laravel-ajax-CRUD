<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Blog;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
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
public function addItem(Request $req){
	$rules = array(
		'title' => 'required',
		'description' => 'required',
		);
	$validator = \Validator::make(Input::all(), $rules);
	if( $validator->fails())
		 return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
	else{
		$blog = new Blog();
		$blog->title = $req->title;
		$blog->description = $req->description;
		$blog->save();
		return response()->json($blog);
	}

}






    }
