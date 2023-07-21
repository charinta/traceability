<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    // melihat data tabel
    public function getUser () {
        $user = User::all();
        return view('user-account')->with('user', $user);
    }

    public function createUser() {
        return view('user-account');
    }

    // menyimpan data/menyimpan insert data 
    public function storeUser(Request $request): RedirectResponse{
        $this -> validate($request,[
            'username'=> 'required',
            'npk' => 'required',
            'pos_id' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $data = $request->all();
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta'); 
        $user = User::create($data);

         return redirect()->route('user-account.getUser')->with(['success'=>'Data Berhasil Diubah!']);
    }
    
    // view ke halaman edit
    public function editUser($id){
        $user = User::findOrFail($id);
        return view('edit-user-account', compact('user'));
    }

    // update data
    public function updateUser(Request $request, User $user){
        $validatedData = $request->validate([
            'username' => 'required',
            'npk' => 'required',
            'pos' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $user->update($validatedData);

        return redirect()->route('user-account.getUser')->with(['success'=>'Data Berhasil Diubah!']);
    }

    // hapus data
    public function destroy(User $user){
        $user->delete();

        return redirect()->route('user-account.getUser')->with(['success'=>'Data Berhasil Dihapus']);
    }
}