<?php

namespace App\Http\Controllers;

use App\Models\Holder;
use App\Http\Controllers\HolderController;
use App\Http\Controllers\LineController;
use App\Models\Tool;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ToolController extends Controller
{
    // melihat data Tool
    public function index(HolderController $HolderController, LineController $LineController, OPController $OPController)
    {
        $tool = Tool::paginate(10);
        // agar tabel register holder terbaca di form
        $HolderController = app(HolderController::class);
        $noDrawingHold = $HolderController->getNoDraw();

        $LineController = app(LineController::class);
        $getLineNames = $LineController->getLine();

        $OPController = app(OPController::class);
        $getOPNames = $OPController->getOP();
        return view('register-tool', compact('tool', 'noDrawingHold', 'getLineNames', 'getOPNames'));
    }

    // public function show(Tool $tool, $id)
    // {
    //     return view('register-tool', compact('tool'));
    // }

    public function show($id)
    {
        $tool = Tool::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Item',
            'data'    => $tool
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $HolderController = app(HolderController::class);
        $noDrawingHold = $HolderController->getNoDraw();

        $tool = Tool::where('no_drawing_tool', 'like', "%" . $keyword . "%")
            ->orWhere('tool_type', 'like', "%" . $keyword . "%")
            ->orWhere('tool_lifetime_std', 'like', "%" . $keyword . "%")
            ->paginate(10);
        return view('register-tool', compact('tool', 'noDrawingHold'))->with('i', ($tool->currentPage() - 1) * $tool->perPage());
    }

    // menyimpan data/menyimpan insert data 
    public function store(Request $request, Tool $tool): RedirectResponse
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
            'image_check' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'remark' => 'required',
        ]);

        $data = $request->all();
        if ($request->hasFile('image_check')) {
            $uploadedImage = $request->file('image_check');
            // Menyimpan file ke direktori public/assets/img/
            $imagePath = 'assets/img/image_check/';
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $uploadedImage->move(public_path($imagePath), $imageName);
            // Menyimpan path gambar dalam data yang akan disimpan
            $data['image_check'] = $imagePath . $imageName; // Ubah 'image_path' menjadi 'image_check'
        }
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

        $LineController = app(LineController::class);
        $getLineNames = $LineController->getLine();

        $OPController = app(OPController::class);
        $getOPNames = $OPController->getOP();
        return view('edit-register-tool', compact('tool', 'noDrawingHold', 'getLineNames', 'getOPNames'));
    }

    // update data
    // public function update(Request $request, Tool $tool, $id)
    // {
    //     $tool = Tool::findOrFail($id);
    //     $validatedData = $request->validate([
    //         'no_drawing_tool' => 'required',
    //         'tool_type' => 'required',
    //         'tool_spec' => 'required',
    //         'tool_diameter' => 'required',
    //         'tool_lifetime_std' => 'required',
    //         'tool_frequency_std' => 'required',
    //         'line' => 'required',
    //         'op' => 'required',
    //         'no_drawing_holder' => 'required',
    //         'washing_ct' => 'required',
    //         'grinding_ct' => 'required',
    //         'setting_ct' => 'required',
    //         'image_check' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'remark' => 'required' // Aturan validasi gambar
    //     ]);

    //     if ($request->hasFile('image_check')) {
    //         $uploadedImage = $request->file('image_check');
    //         $imagePath = public_path('assets/img/'); // Tentukan folder penyimpanan gambar

    //         $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
    //         $uploadedImage->move($imagePath, $imageName);


    //         $tool->image_check = 'assets/img/' . $imageName;
    //     }

    //     $tool->update();

    //     return redirect()->route('register-tool.index')->with(['success' => 'Data Berhasil Diubah!']);
    // }


    public function update(Request $request, $id)
    {
        // Find Tool
        $tool = Tool::findOrFail($id);

        // Validate
        $validate = $request->validate([
            'no_drawing_tool' => ['required'],
            'tool_type' => ['required'],
            'tool_spec' => ['required'],
            'tool_diameter' => ['required'],
            'tool_lifetime_std' => ['required'],
            'tool_frequency_std' => ['required'],
            'line' => ['required'],
            'op' => ['required'],
            'no_drawing_holder' => ['required'],
            'washing_ct' => ['required'],
            'grinding_ct' => ['required'],
            'setting_ct' => ['required'],
            'image_check' => ['required'],
            'remark' => ['required'],
        ]);

        if ($request->hasFile('image_check')) {
            $uploadedImage = $request->file('image_check');
            $imagePath = public_path('assets/img/image_check/'); // Tentukan folder penyimpanan gambar

            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $uploadedImage->move($imagePath, $imageName);


            $tool->image_check = 'assets/img/image_check/' . $imageName;
        }
        // Updating
        $tool->update([
            'no_drawing_tool' => $request->no_drawing_tool,
            'tool_type' => $request->tool_type,
            'tool_spec' => $request->tool_spec,
            'tool_diameter' => $request->tool_diameter,
            'tool_lifetime_std' => $request->tool_lifetime_std,
            'tool_frequency_std' => $request->tool_frequency_std,
            'line' => $request->line,
            'op' => $request->op,
            'no_drawing_holder' => $request->no_drawing_holder,
            'washing_ct' => $request->washing_ct,
            'grinding_ct' => $request->grinding_ct,
            'setting_ct' => $request->setting_ct,
            'image_check' => $request->image_check,
            'remark' => $request->remark,
        ]);


        // Response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $tool
        ]);
    }

    // delete data/hapus data
    public function destroy(Tool $tool, $id)
    {
        $tool = Tool::findOrFail($id);
        $tool->delete();

        return redirect()->route('register-tool.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
