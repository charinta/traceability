<?php

namespace App\Http\Controllers;

use App\Models\RegrindingAuto;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class HomeController extends Controller
{
    //untuk redirect ke dashboard 
    public function home()
    {
        return redirect('login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function index()
    {
        $regrindingAutos = RegrindingAuto::all();

        $months = [];
        $shift1Duration = [];
        $shift2Duration = [];

        foreach ($regrindingAutos as $regrindingAuto) {
            $month = date('d', strtotime($regrindingAuto->date_scan));
            $time = date('H:i:s', strtotime($regrindingAuto->shift));

            if (!isset($months[$month])) {
                $months[$month] = 1;
            } else {
                $months[$month]++;
            }

            if ($time >= '07:30:00' && $time < '16:30:00') {
                if (!isset($shift1Duration[$month])) {
                    $shift1Duration[$month] = 0;
                }
                $shift1Duration[$month]++;
            } elseif ($time >= '21:00:00' || $time < '05:00:00') {
                if (!isset($shift2Duration[$month])) {
                    $shift2Duration[$month] = 0;
                }
                $shift2Duration[$month]++;
            }
        }

        $months = array_keys($months);
        $shift1 = array_values($shift1Duration);
        $shift2 = array_values($shift2Duration);

        // dd($months, $shift1, $shift2);

        return view('dashboard', compact('months', 'shift1', 'shift2'));
    }
}