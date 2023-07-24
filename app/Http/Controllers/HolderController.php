<?php

namespace App\Http\Controllers;

use App\Models\Holder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HolderController extends Controller
{
    // melihat data Holder
    public function getHolder () {
        $holder = Holder::all();
        return view('register-holder')->with('holder', $holder);
    }

    // menyimpan data/menyimpan insert data 
    public function storeHolder(Request $request): RedirectResponse{
        $this -> validate($request, [
            'no_drawing_holder'=> 'required',
            'holder_name' => 'required',
            'holder_spec' => 'required',
            'holder_diameter' => 'required',
            'holder_lifetime_std' => 'required',
            'holder_frequency_std' => 'required',
        ]);

        $data = $request->all();
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta'); 
        $holder = Holder::create($data);


         return redirect()->route('register-holder.getHolder')->with(['success'=>'Data Berhasil Diubah!']);
    }

    // view ke halaman update
    public function editHolder($id){
        $holder = Holder::findOrFail($id);
        return view('edit-register-holder', compact('holder'));
    }

    // update data
    public function updateHolder(Request $request, Holder $holder){
        $validatedData = $request->validate([
           'no_drawing_holder'=> 'required',
            'holder_name' => 'required',
            'holder_spec' => 'required',
            'holder_diameter' => 'required',
            'holder_lifetime_std' => 'required',
            'holder_frequency_std' => 'required',
        ]);

        $holder->update($validatedData);

        return redirect()->route('register-holder.getHolder')->with(['success'=>'Data Berhasil Diubah!']);
    }

    // delete data/hapus data
    public function destroy(Holder $holder){
        $holder->delete();

        return redirect()->route('register-holder.getHolder')->with(['success'=>'Data Berhasil Dihapus']);
    }
}