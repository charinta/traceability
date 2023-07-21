<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\Standar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class StandarController extends Controller
{
    public function index(): View
    {
        // Get data standar
        $tbl_register_standar_check = Standar::oldest('id')->paginate(3);

        // Render view with data standar
        return view('register-standar', compact('tbl_register_standar_check'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'pos_name' => 'required',
            'item_check' => 'required',
            'standard_check' => 'required',
            'standard_value' => 'required_if:standard_check,opt-standard-value',
            'batas_atas' => 'required_if:standard_check,opt-standard-value',
            'batas_bawah' => 'required_if:standard_check,opt-standard-value',
            'standard_string' => 'required_if:standard_check,opt-standard-string',
            'standard_image' => 'required_if:standard_check,opt-standard-image|image|mimes:jpeg,png,jpg|max:2048',
            'remark' =>'required_if:standard_check,opt-standard-image',
            'status' => 'required',
        ]);

        // Save the data to the database
        $data = $request->all();
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta');
        $tbl_register_standar_check = Standar::create($data);

        return redirect()->route('register-standar.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id): RedirectResponse
    {
        $tbl_register_standar_check = Standar::findOrFail($id);
        $tbl_register_standar_check->delete();
        return redirect()->route('register-standar.index')->with(['success' => 'Data terhapus!']);
    }
}
