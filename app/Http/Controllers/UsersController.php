<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(5);

        return view('admin.users.user', compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.createUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->post('name');
        $email = $request->post('email');
        $password = $request->post('password');
        $type = $request->post('type');

        $users = new User;
        $users->name = $name;
        $users->email = $email;
        $users->password = $password;
        $users->type = $type;
        $users->save();

        return redirect()->route('admin.user')->with('success', 'Pengguna baru berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->post('name');
        $email = $request->post('email');
        $password = $request->post('password');
        $type = $request->post('type');

        $users = User::find($id);
        $users->name = $name;
        $users->email = $email;
        $users->password = $password;
        $users->type = $type;
        $users->save();

        return redirect()->route('admin.user')->with('success', 'Pengguna berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id)->delete();

        return response()->json($user);
    }
}
