<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index($comments_id)
    {
        $like = Like::where('comments_id', $comments_id)->where('users_id', auth()->user()->id)->first();

        if ($like) {
            $like->delete();
            return back();
        }else{
            Like::create([
                'users_id' => auth()->user()->id,
                'comments_id' => $comments_id,
            ]);
            return back();
        }
    }
}
