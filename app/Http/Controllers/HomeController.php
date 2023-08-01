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

    public function index()
    {
        $year = ['2023'];

        $user = [];
        foreach ($year as $value) {
            $user[] = RegrindingAuto::where(FacadesDB::raw("FORMAT(date_created, 'yyyy')"), $value)->count();
        }

        return view('dashboard', compact('year', 'user'));
    }


    // public function createChart(){
    //     $regrinding_auto = RegrindingAuto::select('date_scan')->get();
    //     $datasets = [];
    //     foreach($regrinding_auto as $sub){
    //         $dataset = $this->createDataset($sub->id,2022);
    //         $datasets[] = $dataset;
    //     }
    //     // dd($datasets);
    //     $labels = [
    //         1, 2, 3, 4, 5, 6, 7, 8, 9
    //     ];
    //     return [
    //         'type'=>'bar',
    //         'data'=>[
    //             'labels'=>$labels,
    //             'datasets'=>$datasets
    //         ]
    //     ];
    // }

    //  public function createDataset($regrinding_auto,$year){
    //     $year_month = [
    //         '2022-01','2022-02','2022-03','2022-04','2022-05','2002-06','2022-07','2022-08','2022-09','2022-10','2022-11','2022-12'
    //     ];
    //     $label = RegrindingAuto::findOrFail($regrinding_auto);
    //     $data = [];
    //     foreach($year_month as $y){
    //         $result = EntrySpj::where('regrinding_auto',$regrinding_auto)->where('tanggal','like',$y.'%')->sum('nominal');
    //         $data[] = $result;
    //     }

    //     $randomColor ='rgb('. rand(1,255). ',' .rand(1,255). ','. rand(1,255) .')';

    //     return [
    //         'label'=> $label->kode_sub. ' - '.$label->nama_sub_kegiatan,
    //         'data'=>$data,
    //         'fill'=>false,
    //         'borderColor' => $randomColor,
    //         'tension' => 0.1
    //     ];
    // }
}
