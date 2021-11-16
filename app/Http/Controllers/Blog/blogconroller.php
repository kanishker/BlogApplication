<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\blogs;

class blogconroller extends Controller
{
    public function index()
    {
        $blog = blogs::all();
        
        return $blog;
    }

    public function create(Request $request)
    {
        $blog = new blogs;

    try {
        $blog->name = $request->name;
        $blog->content = $request->content;
        $blog->save();

        return response()->json([
            'success'=>true,
            'messege'=>'Blog Created'
        ]);

    } catch (\Throwable $th) {
        return response()->json([
            'success'=>true,
            'messege'=> $th
        ]);
    }
    }
}
