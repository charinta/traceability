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
    public function index(): View
    {
        //get data pos
        $tbl_pos = Pos::oldest('id')->paginate(11);

        //render view with data pos
        return view('register-pos', compact('tbl_pos'));
    }

    public function show(Pos $tbl_pos, $id)
    {
        return view('register-pos', compact('tbl_pos'));
    }


    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $tbl_pos = Pos::where('pos_name', 'like', "%" . $keyword . "%")
            ->orWhere('status', 'like', "%" . $keyword . "%")
            ->paginate(10);
        return view('register-pos', compact('tbl_pos'))->with('i', ($tbl_pos->currentPage() - 1) * $tbl_pos->perPage());
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'pos_name' => 'required | max:50',
            'status' => 'required',

        ]);

        $data = $request->all();
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta');
        $tbl_pos = Pos::create($data);




        return redirect()->route('register-pos.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function getActivePosNames()
    {
        $activePosNames = Pos::where('status', 'active')->pluck('pos_name');
        return $activePosNames;
    }

    public function updateStatus(Request $request, $id)
    {
        $status = $request->input('status');
        $pos = Pos::findOrFail($id);
        $pos->status = $status;
        $pos->save();

        return response()->json(['message' => 'Status berhasil diperbarui!']);
    }

    public function destroy($id): RedirectResponse
    {
        $tbl_pos = Pos::findOrFail($id);
        $tbl_pos->delete();
        return redirect()->route('register-pos');
    }
}
