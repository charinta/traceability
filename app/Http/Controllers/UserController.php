<?php

namespace App\Http\Controllers;

use App\Models\Pos;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // melihat data tabel
    public function getUser () {
        // tabel join untuk melihat pos_name dari pos_id
        $user = User::select('tbl_user_account.*', 'tbl_pos.pos_name')
        ->join('tbl_pos', 'tbl_pos.pos_id', '=', 'tbl_user_account.pos_id')
        ->get();

        // agar tabel pos terbaca di form
        $pos = Pos::all();
        return view('user-account', compact('user', 'pos'));
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

         return redirect()->route('user-account.getUser');
    }
    
    // view ke halaman edit
    public function editUser($id){
        $user = User::findOrFail($id);
        // agar tabel pos terbaca di form
        $pos = Pos::all();
        return view('edit-user-account', compact('user', 'pos'));
    }

    // update data
    public function updateUser(Request $request, User $user, $id){
        // dd($request->input());
        
        $user=User::findOrFail($id);
        $validatedData = $request->validate([
            'username' => 'required',
            'npk' => 'required',
            'pos_id' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $user->username = $request->input('username');
        $user->npk = $request->input('npk');
        $user->role = $request->input('role');
        $user->password = $request->input('password');
         // Update 'pos_id' by retrieving the related Pos model and assigning its primary key
        $pos = Pos::findOrFail($request->input('pos_id'));
        $user->pos_id = $pos->pos_id;
        $user->save();
        
        // $user->update($validatedData);


        return redirect()->route('user-account.getUser');
    }

    // hapus data
    public function destroy(User $user, $id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user-account.getUser');
    }
}