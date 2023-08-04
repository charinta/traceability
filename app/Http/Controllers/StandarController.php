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
                'unit-dropdown' => 'required',
                'batas_atas' => 'required',
                'batas_bawah' => 'required',
            ]);

            $combinedValue = $request->input('standard_check') . ' ' . $request->input('unit-dropdown');
            $statusData = 'int';
            // $remark = $request->input('standard_check');

        } elseif ($selectedOption === 'Standard String') {
            $this->validate($request, [
                'standard_check' => 'required',
            ]);

            $combinedValue = $request->input('standard_check');
            $statusData = 'string';
            // $remark = $request->input('standard_check');
        }

        $request->merge([
            'batas_atas' => $request->input('batas_atas', 0),
            'batas_bawah' => $request->input('batas_bawah', 0),

        ]);


        $data = $request->all();
        $data['standard_check'] = $combinedValue;
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
                'unit-dropdown' => 'required',
                'batas_atas' => 'required',
                'batas_bawah' => 'required',
            ]);

            $combinedValue = $request->input('standard_check') . ' ' . $request->input('unit-dropdown');
            $statusData = 'int';
        } elseif ($selectedOption === 'Standard String') {
            $this->validate($request, [
                'standard_check' => 'required',
            ]);

            $combinedValue = $request->input('standard_check');
            $statusData = 'string';
        }

        $request->merge([
            'batas_atas' => $request->input('batas_atas', 0),
            'batas_bawah' => $request->input('batas_bawah', 0),
        ]);

        $standar = Standar::findOrFail($id);
        $data = $request->all();

        if ($standar->status_data === 'string' && $selectedOption === 'Standard Value') {
            // Data awalnya adalah "Standard String" dan diubah menjadi "Standard Value"
            // Update status_data dan combined value
            $data['status_data'] = 'int';
            $data['standard_value'] = $combinedValue;
        } else {
            // Jika data tidak berubah, atau berubah dari "Standard Value" ke "Standard String"
            // atau tetap "Standard String", biarkan nilai status_data dan combined value seperti sebelumnya.
            $data['status_data'] = $standar->status_data;
            $data['standard_value'] = $standar->standard_value;
        }

        $data['date_modify'] = Carbon::now('Asia/Jakarta');

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
