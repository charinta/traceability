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
    public function index(Line $line)
    {
        $OP = OP::where('line', $line->line)->paginate(10);
        return view('register-op', compact('OP', 'line'));
    }

    public function store(Request $request, Line $line): RedirectResponse
    {
        $this->validate($request, [
            'line' => 'required | exists:line,id',
            'OP' => 'required',
        ]);

        $data = $request->all();
        $data['line'] = $line->line;
        $OP = OP::create($data);

        return redirect()->route('register-op.index', $line->id);
    }

    public function showTPData($id)
    {
        $OP = OP::findOrFail($id);
        $tool_process = ToolProcess::where('id', $id)->paginate(10);

        return view('tool-process', ['OP' => $OP, 'tool_process' => $tool_process]);
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
