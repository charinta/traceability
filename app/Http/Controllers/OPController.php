<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\OP;
use App\Models\Line;
use App\Models\ToolProcess;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OPController extends Controller
{
    // melihat data OP
    public function index(): View
    {
        $OP = OP::paginate(10);
        return view('register-op')->with('OP', $OP);
    }

    public function showTPData($id)
    {
        $OP = OP::findOrFail($id);
        $tool_process = ToolProcess::where('id', $id)->paginate(10);

        return view('tool-process', ['OP' => $OP, 'tool_process' => $tool_process]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'OP' => 'required',
        ]);

        $data = $request->all();
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta');
        $OP = OP::create($data);

        return redirect()->route('register-op.index');
    }
    // view ke halaman update
    public function edit($id)
    {
        $OP = OP::findOrFail($id);
        return view('edit-register-op', compact('OP'));
    }

    // update data
    public function update(Request $request, OP $OP, $id)
    {
        $OP = OP::findOrFail($id);

        $validatedData = $request->validate([
            'op' => 'required',
        ]);

        $OP->update($validatedData);

        return redirect()->route('register-OP.index');
    }

    public function destroy(OP $OP)
    {
        $OP->delete();

        return redirect()->route('register-op.index');
    }
}
