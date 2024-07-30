<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(request('keyword'));
        $reports = Report::latest()->searchQuery()->with('users', 'categories')->paginate(5);
        $categories = Category::all();

        // dd($reports);

        return view('home', compact('reports', 'categories'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $category_id = $request->post('category_id');
        $title = $request->post('title');
        $description = $request->post('description');

        $report = new Report;
        $report->users_id = Auth::id();
        $report->category_id = $category_id ?? null;
        $report->title = $title;
        $report->description = $description;
        $report->save();

        return redirect()->route('home')->with('success', 'Diskusi berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report, Comment $comment)
    {
        $like = Like::where('comments_id', $comment->id)->count();
        //dd($comment->likes);
        return view('user.show', compact('report', 'like'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        return view('user.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category_id = $request->post('category_id');
        $title = $request->post('title');
        $description = $request->post('description');

        $report = Report::find($id);
        $report->users_id = Auth::id();
        $report->category_id = $category_id ?? null;
        $report->title = $title;
        $report->description = $description;
        $report->save();

        return redirect()->route('home')->with('success', 'Diskusi berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = Report::find($id)->delete();

        return redirect()->route('home')->with('success', 'Diskusi berhasil dihapus.');
    }
}
