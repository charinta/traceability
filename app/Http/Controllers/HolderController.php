<?php

namespace App\Http\Controllers;

use App\Models\Holder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HolderController extends Controller
{
    // melihat data Holder
    public function index()
    {
        $holder = Holder::paginate(10);
        return view('register-holder')->with('holder', $holder);
    }

    // menyimpan data/menyimpan insert data 
    public function store(Request $request): RedirectResponse {
        $this->validate($request, [
            'no_drawing_holder' =>'required',
            'holder_name' =>'required',
            'holder_spec' =>'required',
            'holder_diameter' =>'required',
            'holder_lifetime_std' =>'required',
            'holder_frequency_std' =>'required',
        ]);

        $data = $request->all();
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta');
        $holder = Holder::create($data);

        return redirect()->route('register-holder.index');
    }

    // view ke halaman update
    public function edit($id)
    {
        $holder = Holder::findOrFail($id);
        return view('edit-register-holder', compact('holder'));
    }

    // update data
    public function update(Request $request, Holder $holder, $id)
    {

        $holder = Holder::findOrFail($id);
        $validatedData = $request->validate([
            'no_drawing_holder' => 'required',
            'holder_name' => 'required',
            'holder_spec' => 'required',
            'holder_diameter' => 'required',
            'holder_lifetime_std' => 'required',
            'holder_frequency_std' => 'required',
        ]);

        $data = $request->all();
        $holder->update($data);

        // $holder->update($validatedData);

        return redirect()->route('register-holder.index');
    }

    // delete data/hapus data
    public function destroy(Holder $holder, $id)
    {
        $holder = Holder::findOrFail($id);
        $holder->delete();

        return redirect()->route('register-holder.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}