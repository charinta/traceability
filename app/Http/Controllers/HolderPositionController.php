<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HolderPosition;
use Illuminate\Contracts\View\View;

class HolderPositionController extends Controller
{
    public function index(): View
    {
        //get data pos
        $holder_position = HolderPosition::oldest('id')->paginate(11);

        //render view with data pos
        return view('resume-holder', compact('holder_position'));
    }

    public function show(HolderPosition $holder_position, $id)
    {
        return view('resume-holder', compact('holder_position'));
    }


    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $holder_position = HolderPosition::where('no_drawing', 'like', "%" . $keyword . "%")
            ->paginate(10);
        return view('resume-holder', compact('holder_position'))->with('i', ($holder_position->currentPage() - 1) * $holder_position->perPage());
    }
}
