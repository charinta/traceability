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

    public function show($id)
    {
        $holder = Holder::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Item',
            'data'    => $holder  
        ]); 
    }

    // menyimpan data/menyimpan insert data 
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'no_drawing_holder' => 'required',
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

        return redirect()->route('register-holder.index');
    }

    public function getNoDraw()
    {
        $noDrawingHold = Holder::pluck('no_drawing_holder');
        return $noDrawingHold;
    }

    // view ke halaman update
    public function edit($id)
    {
        $holder = Holder::findOrFail($id);
        return view('edit-register-holder', compact('holder'));
    }

    // update data
    // public function update(Request $request, Holder $holder, $id)
    // {

    //     $holder = Holder::findOrFail($id);
    //     $validatedData = $request->validate([
    //         'no_drawing_holder' => 'required',
    //         'holder_name' => 'required',
    //         'holder_spec' => 'required',
    //         'holder_diameter' => 'required',
    //         'holder_lifetime_std' => 'required',
    //         'holder_frequency_std' => 'required',
    //     ]);

    //     $data = $request->all();
    //     $holder->update($data);

    //     return redirect()->route('register-holder.index');
    // }

    public function update(Request $request, $id)
    {
    // Find Holder
    $holder = Holder::findOrFail($id);

    // Validate
    $validate = $request->validate([
      'no_drawing_holder' => ['required'],
      'holder_name' => ['required'],
      'holder_spec' => ['required'],
      'holder_diameter' => ['required'],
      'holder_lifetime_std' => ['required'],
      'holder_frequency_std' => ['required'],
    ]);

    // Updating
    $holder->update([
      'no_drawing_holder' => $request->no_drawing_holder,
      'holder_name' => $request->holder_name,
      'holder_spec' => $request->holder_spec,
      'holder_diameter' => $request->holder_diameter,
      'holder_lifetime_std' => $request->holder_lifetime_std,
      'holder_frequency_std' => $request->holder_frequency_std,
    ]);

    // Response
    return response()->json([
      'success' => true,
      'message' => 'Data Berhasil Diudapte!',
      'data'    => $holder
    ]);
    }

    // delete data/hapus data
    public function destroy(Holder $holder, $id)
    {
        $holder = Holder::findOrFail($id);
        $holder->delete();

        return redirect()->route('register-holder.index');
    }
}