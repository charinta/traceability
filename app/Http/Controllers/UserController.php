<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PosController;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // melihat data tabel
    public function index(PosController $PosController)
    {
        $PosController = app(PosController::class);
        // agar tabel pos terbaca di form
        $user = User::paginate(10);
        $activePosNames = $PosController->getActivePosNames();
        return view('user-account', compact('user', 'activePosNames'));
    }

    public function show(User $user, $id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Item',
            'data'    => $user
        ]);
    }

    // menyimpan data/menyimpan insert data 
    // app/Http/Controllers/UserController.php

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $PosController = app(PosController::class);
        $activePosNames = $PosController->getActivePosNames();
        $user = User::where('username', 'like', "%" . $keyword . "%")
            ->orWhere('npk', 'like', "%" . $keyword . "%")
            ->orWhere('pos', 'like', "%" . $keyword . "%")
            ->orWhere('role', 'like', "%" . $keyword . "%")
            ->paginate(10);
        return view('user-account', compact('user', 'activePosNames'))->with('i', ($user->currentPage() - 1) * $user->perPage());
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'username' => 'required',
            'npk' => 'required',
            'pos' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $insertedRole = $request->input('role');

        // Pengecekan dan assign role
        if ($insertedRole === "admin") {
            $assignRole = "admin";
        } else {
            $assignRole = "user";
        }

        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta');
        $data['role'] = $assignRole;
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
    // public function update(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);

    //     $validatedData = $request->validate([
    //         'username' => 'required',
    //         'npk' => 'required',
    //         'pos' => 'required',
    //         'role' => 'required',
    //         'password' => 'required',
    //     ]);

    //     $validatedData['password'] = Hash::make($request->input('password'));
    //     $user->update($validatedData);

    //     return redirect()->route('user-account.index')->with('success', 'User account updated successfully.');
    // }

    public function update(Request $request, $id)
    {
        // Find Holder
        $user = User::findOrFail($id);

        // Validate
        $validate = $request->validate([
            'username' => ['required'],
            'npk' => ['required'],
            'pos' => ['required'],
            'role' => ['required'],
            'password' => ['required'],
        ]);

        // Updating
        $user->update([
            'username' => $request->username,
            'npk' => $request->npk,
            'pos' => $request->pos,
            'role' => $request->role,
            'password' => $request->password,
        ]);

        $validate['password'] = Hash::make($request->input('password'));
        $user->update($validate);

        // Response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $user
        ]);
    }


    // hapus data
    public function destroy(User $user, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user-account.index');
    }
}
