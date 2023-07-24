<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\Standar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StandarController extends Controller
{
    public function index(){
        $standar = Standar::paginate(10);
        return view('register-standar')->with('standar',$standar);
    }

    public function create():View
    {
        return view('register-standar');
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
        $standar = Standar::create($data);

        return redirect()->route('register-standar.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

   

    public function destroy(Standar $standar): RedirectResponse
    {
       
        $standar->delete();
        
        return redirect()->route('register-standar.index')->with(['success' => 'Data terhapus!']);
    }
}
