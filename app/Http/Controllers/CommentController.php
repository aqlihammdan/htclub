<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $reports_id = $request->post('reports_id');
        $commentuser = $request->post('comment');

        $comments = new Comment;
        $comments->users_id = Auth::id();
        $comments->reports_id = $reports_id;
        $comments->comment = $commentuser;
        $comments->save();

        return redirect()->route('reports.show', $comments->reports_id)->with('success', 'Komentar berhasil dibuat.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id)->delete();

        return redirect()->route('reports.show', $comment->reports_id)->with('success', 'Komentar berhasil dibuat.');
    }
}
