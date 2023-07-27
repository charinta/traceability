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


         return redirect()->route('register-holder.getHolder');
    }

    // view ke halaman update
    public function editHolder($holder_id){
        $holder = Holder::findOrFail($holder_id);
        return view('edit-register-holder', compact('holder'));
    }

    // update data
    public function updateHolder(Request $request, Holder $holder, $holder_id){

        $holder=Holder::findOrFail($holder_id);
        $validatedData = $request->validate([
           'no_drawing_holder'=> 'required',
            'holder_name' => 'required',
            'holder_spec' => 'required',
            'holder_diameter' => 'required',
            'holder_lifetime_std' => 'required',
            'holder_frequency_std' => 'required',
        ]);

        $holder->no_drawing_holder = $request->input('no_drawing_holder');
        $holder->holder_name = $request->input('holder_name');
        $holder->holder_spec = $request->input('holder_spec');
        $holder->holder_diameter = $request->input('holder_diameter');
        $holder->holder_lifetime_std = $request->input('holder_lifetime_std');
        $holder->holder_frequency_std = $request->input('holder_frequency_std');
        $holder->save();

        // $holder->update($validatedData);

        return redirect()->route('register-holder.getHolder');
    }

    // delete data/hapus data
    public function destroy(Holder $holder, $holder_id){
        $holder = Holder::findOrFail($holder_id);
        $holder->delete();

        return redirect()->route('register-holder.getHolder')->with(['success'=>'Data Berhasil Dihapus']);
    }
}