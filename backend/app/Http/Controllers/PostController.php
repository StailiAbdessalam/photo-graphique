<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Symfony\Component\VarDumper\VarDumper;

class PostController extends Controller
{
    public function getAll()
    {
        return  json_encode(Post::all());
    }


    public function Add(Request $request)
    {

            $Post = new Post();
            $Post->user_id = $request->user_id;
            $Post->Title = $request->Title;
            $Post->image = $request->image;
            $Post->Prix = $request->Prix;
            $Post->Type = $request->Type;
            $Post->description = $request->description;
            $result = $Post->save();
            echo json_encode($result);
            // return Post::create($request->all());

    }
}
