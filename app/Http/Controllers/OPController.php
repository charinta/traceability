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
    public function index($line_id)
    {
        $line = Line::findOrFail($line_id);
        $ops = $line->ops()->paginate(10);
        return view('register-op', compact('ops', 'line'));
    }


    public function store(Request $request, $line_id): RedirectResponse
    {
        $this->validate($request, [
            'op' => 'required',
        ]);

        $data = $request->all();
        $data['line_id'] = $line_id; // Mengambil nilai dari URL
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta');
        $ops = OP::create($data);

        return redirect()->route('register-op.line', $line_id);
    }



    public function showTPData($id)
    {
        $ops = OP::findOrFail($id);
        $tool_process = ToolProcess::where('id', $id)->paginate(10);

        return view('tool-process', ['ops' => $ops, 'tool_process' => $tool_process]);
    }

    // view ke halaman update
    public function edit($id)
    {
        $ops = OP::findOrFail($id);
        return view('edit-register-op', compact('ops'));
    }

    // update data
    public function update(Request $request, $id)
    {
        $ops = OP::findOrFail($id);

        $validatedData = $request->validate([
            'op' => 'required',
        ]);

        $ops->update($validatedData);

        return redirect()->route('register-op.line', $ops->line_id); // Redirect back to where you want to go
    }


    public function destroy(OP $ops)
    {
        $ops->delete();

        return redirect()->route('register-op.line');
    }
}
