<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
//untuk redirect ke dashboard 
    public function home()
    {
        return redirect('dashboard');
    }
}