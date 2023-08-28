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
        $standar = Standar::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Item',
            'data'    => $standar
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $PosController = app(PosController::class);
        $activePosNames = $PosController->getActivePosNames();
        $standar = Standar::where('pos_name', 'like', "%" . $keyword . "%")
            ->orWhere('item_check', 'like', "%" . $keyword . "%")
            ->orWhere('standard_check', 'like', "%" . $keyword . "%")
            ->orWhere('status', 'like', "%" . $keyword . "%")
            ->paginate(10);
        return view('register-standar', compact('standar', 'activePosNames'))->with('i', ($standar->currentPage() - 1) * $standar->perPage());
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
        $standar = Standar::findOrFail($id);

        $statusData = '';

        $validate = $request->validate([
            'pos_name' => ['required'],
            'item_check' => ['required'],
            'status' => ['required'],
        ]);

        // Fetch the current status_data from the database
        $currentStatusData = $standar->status_data;

        if ($request->input('check') === 'Standard Value') {
            $validate = $request->validate([
                'standard_check' => ['required'],
                'unit-dropdown' => ['required'],
                'batas_atas' => ['required'],
                'batas_bawah' => ['required'],

            ]);

            $combinedValue = $request->input('standard_check') . ' ' . $request->input('unit-dropdown');
            $statusData = 'int';

        } elseif ($request->input('check') === 'Standard String') {
            $validate = $request->validate([
                'standard_check' => ['required'],
            ]);

            $combinedValue = $request->input('standard_check');
            $statusData = 'string';
        }

        // Update the status_data only if it's different from the current value
        if ($statusData !== $currentStatusData) {
            $standar->status_data = $statusData;
        }

        $request->merge([
            'batas_atas' => $request->input('batas_atas', 0),
            'batas_bawah' => $request->input('batas_bawah', 0),
        ]);

        // $data = $request->all();
        // $data['standard_check'] = $combinedValue;
        // $data['date_modify'] = Carbon::now('Asia/Jakarta');

         if ($statusData !== $standar->status_data) {
        $standar->status_data = $statusData;
    }


        $standar->update([
            'pos_name' => $request->pos_name,
            'item_check' => $request->item_check,
            'status' => $request->status,
            'standard_check' => $request->standard_check,
            'batas_atas' => $request->batas_atas,
            'batas_bawah' => $request->batas_bawah,
            'status_data' => $request->status_data,
            'remark' => $request->remark,
        ]);

         return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $standar
        ]);
    }



    public function destroy(Standar $standar, $id): RedirectResponse
    {

        $standar = Standar::findOrFail($id);
        $standar->delete();
        return redirect()->route('register-standar.index')->with(['success']);
    }
}