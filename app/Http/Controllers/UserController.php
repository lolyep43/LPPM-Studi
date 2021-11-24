<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $User = User::latest()->paginate(10);
        return view('admin.user.index', compact('User'));
    }
    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $User = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password_asli'=>$request->password,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('User.index')->with('success', 'User telah ditambahkan');
    }

    public function edit($id){
        $User = User::findorfail($id);
        return view('admin.user.edit', compact('User'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $User = User::findorfail($id);

        $updateUser = [
            'name' => $request->name,
            'email' => $request->email,
            'password_asli' => $request->password,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ];

        $User->update($updateUser);
        return redirect()->route('User.index')->with('success', 'User telah diupdate');

    }

    public function destroy($id)
    {
        $User = User::findorfail($id);
        $User->delete();
        return redirect()->route('User.index')->with('success', 'User telah dihapus');
    }
}
