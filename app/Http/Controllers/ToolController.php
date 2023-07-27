<?php

namespace App\Http\Controllers;

use App\Models\Holder;
use App\Models\Tool;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ToolController extends Controller
{
    // melihat data Tool
    public function getTool () {
        $tool = Tool::all();
        // agar tabel register holder terbaca di form
        $holder = Holder::all();
        return view('register-tool', compact('tool', 'holder'));
    }

    // menyimpan data/menyimpan insert data 
    public function storeTool(Request $request): RedirectResponse{
        $this -> validate($request, [
            'no_drawing_tool'=> 'required',
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
        ]);

        $data = $request->all();
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta'); 
        $tool = Tool::create($data);


         return redirect()->route('register-tool.getTool')->with(['success'=>'Data Berhasil Diubah!']);
    }

    // view ke halaman update
    public function editTool($id){
        $tool = Tool::findOrFail($id);
        return view('edit-register-tool', compact('tool'));
    }

    // update data
    public function updateTool(Request $request, Tool $tool){
        $validatedData = $request->validate([
          'no_drawing_tool'=> 'required',
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
        ]);

        $tool->update($validatedData);

        return redirect()->route('register-tool.getTool')->with(['success'=>'Data Berhasil Diubah!']);
    }

    // delete data/hapus data
    public function destroy(Tool $tool){
        $tool->delete();

        return redirect()->route('register-tool.getTool')->with(['success'=>'Data Berhasil Dihapus']);
    }
}