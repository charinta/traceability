<?php

namespace App\Http\Controllers;

use App\Models\Line;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LineController extends Controller
{
    // melihat data Line
    public function getLine () {
        $line = Line::all();
        return view('register-line-op')->with('line', $line);
    }

    // menyimpan data/menyimpan insert data 
    public function storeLine(Request $request): RedirectResponse{
        $this -> validate($request, [
            'line'=> 'required',
        ]);

        $data = $request->all();
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta'); 
        $line = Line::create($data);

         return redirect()->route('register-line-op.getLine');
    }

    // view ke halaman update
    public function editLine($id){
        $line = Line::findOrFail($id);
        return view('edit-register-line-op', compact('line'));
    }

    // update data
    public function updateLine(Request $request, Line $line){
        $validatedData = $request->validate([
           'line'=> 'required',
        ]);

        $line->update($validatedData);

        return redirect()->route('register-line-op.getLine');
    }

    // delete data/hapus data
    public function destroy(Line $line){
        $line->delete();

        return redirect()->route('register-line-op.getLine');
    }
}