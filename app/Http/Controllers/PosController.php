<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index(): View
    {
        //get data pos
        $tbl_pos = Pos::latest()->paginate(5);

        //render view with data pos
        return view('register-pos', compact('tbl_pos'));
    }
}
