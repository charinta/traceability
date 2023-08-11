<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\Line;
use App\Models\OP;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LineController extends Controller
{
    // melihat data Line
    public function index()
    {
        $line = Line::select('id', 'line')->distinct()->get();
        $line = Line::paginate(10);
        return view('register-line-op', compact('line'));
    }


    // menyimpan data/menyimpan insert data 
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'line' => 'required',
        ]);

        $data = $request->all();
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta');
        $line = Line::create($data);

        return redirect()->route('register-line.index');
    }

    public function showOpData($id)
    {
        $line = Line::findOrFail($id);
        $OP = OP::where('id', $id)->paginate(10); // You can adjust the pagination as needed

        return view('register-op', ['line' => $line, 'OP' => $OP]);
    }

    // view ke halaman update
    public function edit($id)
    {
        $line = Line::findOrFail($id);
        return view('edit-register-line-op', compact('line'));
    }

    // update data
    public function update(Request $request, Line $line)
    {
        $validatedData = $request->validate([
            'line' => 'required',
        ]);

        $line->update($validatedData);

        return redirect()->route('register-line.index');
    }

    // delete data/hapus data
    public function destroy(Line $line)
    {
        $line->delete();
        return redirect()->route('register-line.index');
    }
}
