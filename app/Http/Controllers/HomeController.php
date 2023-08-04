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
        // Your logic for the dashboard route here
        // For example, you can return a view
        return view('dashboard');
    }

    public function index()
{
    // Replace 'RegrindingAuto' with your actual model class
    $regrindingAutos = RegrindingAuto::all();

    $months = [];
    $shift1Duration = [];
    $shift2Duration = [];

    foreach ($regrindingAutos as $regrindingAuto) {
        $month = date('d', strtotime($regrindingAuto->date_scan)); // Extract the year and month
        $time = date('H:i:s', strtotime($regrindingAuto->shift)); // Extract the time component

        // Count the occurrences of the month in the data
        if (!isset($months[$month])) {
            $months[$month] = 1;
        } else {
            $months[$month]++;
        }

        // Calculate the duration of each shift and update the shift duration arrays
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

    // Extract the keys (months) as an array
    $months = array_keys($months);
    // Extract the value (shift durations) as an array
    $shift1 = array_values($shift1Duration);
    $shift2 = array_values($shift2Duration);

    // dd($months, $shift1, $shift2);

    return view('dashboard', compact('months', 'shift1', 'shift2'));
}

}