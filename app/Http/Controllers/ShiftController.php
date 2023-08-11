<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    // melihat data Shift
    public function index()
    {
        $shift = Shift::all();
        return view('shift')->with('shift', $shift);
    }

    public function show($id)
    {
        $shift = Shift::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Item',
            'data'    => $shift  
        ]); 
    }

    // menyimpan data/menyimpan insert data 
    public function store(Request $request): RedirectResponse {
        $this->validate($request, [
            'shift' =>'required',
            'start' =>'required',
            'finish' =>'required',
        ]);

        $data = $request->all();
        $shift = Shift::create($data);

        return redirect()->route('shift.index');
    }

    // view ke halaman update
    // public function edit($id)
    // {
    //     $shift = Shift::findOrFail($id);


    //     return view('edit-shift', compact('shift'));
    // }

    // update data

    public function update(Request $request, $id)
    {
    // Find Holder
    $shift = Shift::findOrFail($id);

    // Validate
    $validate = $request->validate([
      'shift' => ['required'],
      'start' => ['required'],
      'finish' => ['required'],
    ]);

    // Updating
    $shift->update([
      'shift' => $request->shift,
      'start' => $request->start,
      'finish' => $request->finish,
    ]);
    // dd($request);

    // Response
    return response()->json([
      'success' => true,
      'message' => 'Data Berhasil Diudapte!',
      'data'    => $shift
    ]);
    }

    // delete data/hapus data
    public function destroy(Shift $shift, $id)
    {
        $shift = Shift::findOrFail($id);
        $shift->delete();

        return redirect()->route('shift.index');
    }
}