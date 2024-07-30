<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopuserController extends Controller
{
    public function index()
    {
        $workshopusers = Workshop::latest()->paginate(5);

        return view('workshopUser', compact('workshopusers'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
