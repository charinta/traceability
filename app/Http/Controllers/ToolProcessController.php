<?php

namespace App\Http\Controllers;

use App\Models\Line;
use App\Models\OP;
use App\Models\ToolProcess;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ToolProcessController extends Controller
{
    // melihat data Tool Process
    public function index(): View
    {
        $tool_process = ToolProcess::paginate(10);
        return view('tool-process')->with('tool_process', $tool_process);
    }

    public function showOpData($id)
    {
        $line = Line::findOrFail($id);
        $OP = OP::where('id', $id)->paginate(10); 

        return view('register-op.line', ['line' => $line, 'OP' => $OP]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'tool_process' => 'required',
        ]);

        $data = $request->all();
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta');
        $tool_process = ToolProcess::create($data);

        return redirect()->route('tool-process.index');
    }

    public function destroy(ToolProcess $tool_process)
    {
        $tool_process->delete();

        return redirect()->route('tool-process.index');
    }
}