<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\Pos;
use App\Models\Standar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PosController extends Controller
{
    public function index():View
    {
        //get data pos
        $tbl_pos = Pos::oldest('id')->paginate(10);

        //render view with data pos
        return view('register-pos', compact('tbl_pos'));
    }

    public function create():View
    {
        return view('register-pos');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'pos_name' => 'required | max:50',
            'status'=>'required',
            
        ]);

        $data = $request->all();
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta'); 
        $tbl_pos = Pos::create($data);


  

        return redirect()->route('register-pos.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy ($id): RedirectResponse
    {
        $tbl_pos = Pos::findOrFail($id);
        $tbl_pos -> delete();
        return redirect()->route('register-pos.index')->with(['success'=> 'Data terhapus!']);
    }
}
