<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoricalData;
use Illuminate\Contracts\View\View;

class HistoricalDataController extends Controller
{
    public function index(): View
    {
        //get data pos
        $historical = HistoricalData::oldest('id')->paginate(11);

        //render view with data pos
        return view('historical-data', compact('historical'));
    }

    public function show(HistoricalData $historical, $id)
    {
        return view('historical-data', compact('historical'));
    }


    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $historical = HistoricalData::where('id_tool', 'like', "%" . $keyword . "%")
            ->paginate(10);
        return view('historical-data', compact('historical'))->with('i', ($historical->currentPage() - 1) * $historical->perPage());
    }
}
