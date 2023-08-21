<?php

namespace App\Http\Controllers;

use App\Models\Line;
use App\Models\OP;
use App\Models\ToolProcess;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ToolProcessController extends Controller
{
    // melihat data Tool Process
    public function index($op_id): View
    {
        $ops = OP::findOrFail($op_id);
        $line_id = $ops->line_id;

        $line = Line::findOrFail($line_id);
        $line_name = $line->line;

        $tool_process = $ops->ToolProcess()->paginate(10); // Assuming you have defined the correct relation name
        return view('tool-process', compact('ops', 'tool_process', 'line_id', 'line_name'));
    }


    public function store(Request $request, $op_id)
    {
        $validator = Validator::make($request->all(), [
            'tool_process' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $ops = OP::findOrFail($op_id);
        $line_id = $ops->line_id;

        $data = [
            'op_id' => $op_id,
            'line_id' => $line_id,
            'tool_process' => $request->input('tool_process'),
            'date_created' => Carbon::now('Asia/Jakarta'),
            'date_modify' => Carbon::now('Asia/Jakarta'),
        ];

        ToolProcess::create($data);

        return redirect()->route('tool-process.op', ['op_id' => $op_id]);
    }

    public function edit($id)
    {
        $tool_process = ToolProcess::findOrFail($id);

        return view('edit-register-tool-process', compact('tool_process'));
    }

    // update data
    public function update(Request $request, $id)
    {
        $tool_process = ToolProcess::findOrFail($id);

        $validatedData = $request->validate([
            'tool_process' => 'required',
        ]);

        $tool_process->update($validatedData);

        return redirect()->route('tool-process.op', ['op_id' => $tool_process->op_id, 'line_id' => $tool_process->line_id]);
    }

    public function destroy(ToolProcess $tool_process)
    {
        $tool_process->delete();

        return redirect()->route('tool-process.op');
    }
}
