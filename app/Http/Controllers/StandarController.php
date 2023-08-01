<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\Standar;
use App\Http\Controllers\PosController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StandarController extends Controller
{
    public function index(PosController $PosController)
    {
        $PosController = app(PosController::class);
        $standar = Standar::paginate(10);
        $activePosNames = $PosController->getActivePosNames();
        return view('register-standar', compact('standar', 'activePosNames'));
    }

    public function show(Standar $standar, $id)
    {
        return view('register-standar', compact('standar'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $standar = Standar::where('pos_name', 'like', "%" . $keyword . "%")
            ->orWhere('item_check', 'like', "%" . $keyword . "%")
            ->orWhere('standard_check', 'like', "%" . $keyword . "%")
            ->orWhere('status', 'like', "%" . $keyword . "%")
            ->paginate(10);
        return view('register-standar', compact('standar'))->with('i', ($standar->currentPage() - 1) * $standar->perPage());
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'pos_name' => 'required',
            'item_check' => 'required',
            'status' => 'required',
        ]);


        $selectedOption = $request->input('check');
        if ($selectedOption === 'Standard Value') {
            $this->validate($request, [
                'standard_check' => 'required',
                'batas_atas' => 'required',
                'batas_bawah' => 'required',
            ]);

            $combinedValue = $request->input('standard_check') . ' ' . $request->input('unit-dropdown');
            $statusData = 'int';
            $remark = $request->input('standard_check');
        } elseif ($selectedOption === 'Standard String') {
            $this->validate($request, [
                'standard_check' => 'required',
            ]);

            $combinedValue = $request->input('standard_check');
            $statusData = 'string';
            $remark = $request->input('standard_check');
        } elseif ($selectedOption === 'Standard Image') {
            $this->validate($request, [
                'standard_check' => 'required',
                'remark' => 'required',
            ]);

            $combinedValue = $request->input('standard_check');
            $statusData = 'image';
        } else {

            $combinedValue = null;
            $statusData = 'string';
        }


        $request->merge([
            'batas_atas' => $request->input('batas_atas', 0),
            'batas_bawah' => $request->input('batas_bawah', 0),

        ]);


        $data = $request->all();
        $data['standard_value'] = $combinedValue;
        $data['status_data'] = $statusData;
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta');
        //  $data['remark'] = $remark;
        $standar = Standar::create($data);
        return redirect()->route('register-standar.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    // view ke halaman update
    public function edit($id)
    {
        $standar = Standar::findOrFail($id);
        $PosController = app(PosController::class);
        $activePosNames = $PosController->getActivePosNames();
        return view('edit-register-standar', compact('standar', 'activePosNames'));
    }

    // update data
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pos_name' => 'required',
            'item_check' => 'required',
            'status' => 'required',
        ]);

        $selectedOption = $request->input('check');
        if ($selectedOption === 'Standard Value') {
            $this->validate($request, [
                'standard_check' => 'required',
                'batas_atas' => 'required',
                'batas_bawah' => 'required',
            ]);


            $combinedValue = $request->input('standard_check') . ' ' . $request->input('unit-dropdown');
            $statusData = 'int';
            $remark = $request->input('standard_check');
        } elseif ($selectedOption === 'Standard String') {
            $this->validate($request, [
                'standard_check' => 'required',
            ]);


            $combinedValue = $request->input('standard_check');
            $statusData = 'string';
            $remark = $request->input('standard_check');
        } elseif ($selectedOption === 'Standard Image') {
            $this->validate($request, [
                'standard_check' => 'required',
                'remark' => 'required',
            ]);

            $combinedValue = $request->input('standard_check');
            $statusData = 'image';
            $remark = $request->input('remark');
        } else {

            $combinedValue = null;
            $statusData = 'string';
        }


        $request->merge([
            'batas_atas' => $request->input('batas_atas', 0),
            'batas_bawah' => $request->input('batas_bawah', 0),
            //'remark' => $request->input('remark', 0)s
        ]);


        $standar = Standar::findOrFail($id);
        $data = $request->all();
        $data['standard_value'] = $combinedValue;
        $data['status_data'] = $statusData;
        $data['date_modify'] = Carbon::now('Asia/Jakarta');
        $data['remark'] = $remark;
        $standar->update($data);

        return redirect()->route('register-standar.index')->with(['success' => 'Data Berhasil Diperbarui!']);
    }

    public function destroy(Standar $standar, $id): RedirectResponse
    {

        $standar = Standar::findOrFail($id);
        $standar->delete();
        return redirect()->route('register-standar.index')->with(['success']);
    }
}
