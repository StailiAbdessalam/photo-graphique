<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Symfony\Component\VarDumper\VarDumper;

class PostController extends Controller
{

//function to get all post in tow table
    public function getAll()
    {
        $data = Post::join('users', 'users.id', '=', 'post.user_id')
            ->select('post.*', 'users.fullName',)
            ->get();

            foreach ($data as $post) {
                $time = $post->created_at->diffForHumans();
                $post->created_at = $time;
                $post->time =$time;
            }
            return json_encode($data);
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
    }
    public function delete($id)
    {
        Post::destroy($id);
    }

    public function Update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return $post;
    }
}
