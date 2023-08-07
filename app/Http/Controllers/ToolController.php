<?php

namespace App\Http\Controllers;

use App\Models\Holder;
use App\Http\Controllers\HolderController;
use App\Models\Tool;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ToolController extends Controller
{
    // melihat data Tool
    public function index(HolderController $HolderController)
    {
        $tool = Tool::paginate(10);
        // agar tabel register holder terbaca di form
        $HolderController = app(HolderController::class);
        $noDrawingHold = $HolderController->getNoDraw();
        return view('register-tool', compact('tool', 'noDrawingHold'));
    }

    // menyimpan data/menyimpan insert data 
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'no_drawing_tool' => 'required',
            'tool_type' => 'required',
            'tool_spec' => 'required',
            'tool_diameter' => 'required',
            'tool_lifetime_std' => 'required',
            'tool_frequency_std' => 'required',
            'line' => 'required',
            'op' => 'required',
            'no_drawing_holder' => 'required',
            'washing_ct' => 'required',
            'grinding_ct' => 'required',
            'setting_ct' => 'required',
            'image_check' => 'required',
            'remark' => 'required',
        ]);

        $data = $request->all();
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta');
        $tool = Tool::create($data);


        return redirect()->route('register-tool.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    // view ke halaman update
    public function edit($id)
    {
        $tool = Tool::findOrFail($id);
        $HolderController = app(HolderController::class);
        $noDrawingHold = $HolderController->getNoDraw();
        return view('edit-register-tool', compact('tool', 'noDrawingHold'));
    }

    // update data
    public function update(Request $request, Tool $tool, $id)
    {
        $tool = Tool::findOrFail($id);
        $validatedData = $request->validate([
            'no_drawing_tool' => 'required',
            'tool_type' => 'required',
            'tool_spec' => 'required',
            'tool_diameter' => 'required',
            'tool_lifetime_std' => 'required',
            'tool_frequency_std' => 'required',
            'line' => 'required',
            'op' => 'required',
            'no_drawing_holder' => 'required',
            'washing_ct' => 'required',
            'grinding_ct' => 'required',
            'setting_ct' => 'required',
            'image_check' => 'required',
            'remark' => 'required',
        ]);

        $tool->update($validatedData);

        return redirect()->route('register-tool.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    // delete data/hapus data
    public function destroy(Tool $tool)
    {
        $tool->delete();

        return redirect()->route('register-tool.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
