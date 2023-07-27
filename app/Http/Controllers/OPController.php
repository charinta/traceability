<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\OP;
use App\Models\Line;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OPController extends Controller
{
    // melihat data OP
    public function index(): View
    {
        $OP = OP::paginate(10);
        return view('register-op')->with('OP', $OP);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'OP' => 'required',
        ]);

        $data = $request->all();
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta');
        $OP = OP::create($data);

        return redirect()->route('register-op.index');
    }

    public function destroy(OP $OP)
    {
        $OP->delete();

        return redirect()->route('register-op.index');
    }
}
