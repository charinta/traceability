<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToolPosition;
use Illuminate\Contracts\View\View;

class ToolPositionController extends Controller
{
    public function index(): View
    {
        //get data pos
        $tool_position = ToolPosition::oldest('id')->paginate(11);

        //render view with data pos
        return view('resume-tool', compact('tool_position'));
    }

    public function show(ToolPosition $tool_position, $id)
    {
        return view('resume-tool', compact('tool_position'));
    }


    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $tool_position = ToolPosition::where('no_drawing', 'like', "%" . $keyword . "%")
            ->paginate(10);
        return view('resume-tool', compact('tool_position'))->with('i', ($tool_position->currentPage() - 1) * $tool_position->perPage());
    }
}
