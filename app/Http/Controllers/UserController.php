<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PosController;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // melihat data tabel
    public function index()
    {
        $PosController = app(PosController::class);
        // agar tabel pos terbaca di form
        $user = User::paginate(10);
        $activePosNames = $PosController->getActivePosNames();
        return view('user-account', compact('user', 'activePosNames'));
    }

    public function createUser()
    {

        return view('user-account', compact('user'));
    }


    // menyimpan data/menyimpan insert data 
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'username' => 'required',
            'npk' => 'required',
            'pos_name' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $data = $request->all();
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta');
        $user = User::create($data);

        return redirect()->route('user-account.index');
    }

    // view ke halaman edit
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $PosController = app(PosController::class);
        $activePosNames = $PosController->getActivePosNames();
        // agar tabel pos terbaca di form
        return view('edit-user-account', compact('user', 'activePosNames'));
    }

    // update data
    public function update(Request $request, User $user, $id)
    {
        // dd($request->input());

        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'username' => 'required',
            'npk' => 'required',
            'pos_name' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $data = $request->all();
        $user->update($data);

        // $user->update($validatedData);


        return redirect()->route('user-account.index');
    }

    // hapus data
    public function destroy(User $user, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user-account.index');
    }
}
