<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser () {
        $user = User::all();
        return view('user-account')->with('user', $user);
    }

    public function create() {
        return view('user-account');
    }

    public function storeUser(Request $request){
        $validatedData = $request->validate([
            'username'=> 'required',
            'npk' => 'required',
            'pos' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $user = User::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dibuat',
            'data' => $user
        ], 201);
    }

    public function editUser($id){
        $user = User::findOrFail($id);
        return view('edit-user-account', compact('user'));
    }

    public function updateUser(Request $request, User $user){
        $validatedData = $request->validate([
            'username' => 'required',
            'npk' => 'required',
            'pos' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $user->update($validatedData);

        return redirect()->route('user-account')->with(['success'=>'Data Berhasil Diubah!']);
    }

    public function destroy(User $user){
        $user->delete();

        return redirect()->route('user-account')->with(['success'=>'Data Berhasil Dihapus']);
    }
}