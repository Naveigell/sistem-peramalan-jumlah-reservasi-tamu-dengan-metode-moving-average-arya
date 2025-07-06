<?php

namespace App\Http\Controllers;

use App\Charts\ReportChart;
use Carbon\Carbon;
use App\Models\Sale;
use Illuminate\Http\Request;
use Facades\App\Helpers\AutoHelper;

class SaleReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ft = 2;
        $year = Carbon::now()->format('Y');
        if(isset($request->year)) {
            $year = $request->year;
        }

        $birthData = [];
        $births = Sale::orderBy('year')
                    ->orderBy('month')
                    ->get();
        $start = 10000;
        $end = 0;
        $lastMonth = 0;
        foreach ($births as $key => $birth) {
            if ($birth->year < $start) {
                $start = $birth->year;
            }
            if ($birth->year > $end) {
                $end = $birth->year;
            }
            $birthData[$birth->year][$birth->month] = @$birthData[$birth->year][$birth->month] + $birth->qty;
            $lastMonth = $birth->month;
        }
        $years = [];
        // ft = 12 sama dengan satu tahun
        for ($i=$end + 1; $i >= $start; $i--) { 
            $years[$i] = $i;
        }
        $lastMonth++;
        if($lastMonth > 12){
            $end++;
            $lastMonth = 1;
        }
        // $start = 2019;
        // $end = 2021;
        // $births = Birth::all();
        $data = [];
        $monthLabel = [];
        $multiple = 0;
        $limit = 0;
        // dd($birthData);
        for ($i=$start; $i <= $end ; $i++) { 
            for ($x=1; $x <= 12; $x++) { 
                // if(!count($births->where('month', $x)->where('year', $i))){
                if($i != $end || $x <= $lastMonth){
                    $data[($multiple * 12) + $x] = (isset($birthData[$i][$x]))?$birthData[$i][$x]:0;
                    $monthLabel[($multiple * 12) + $x] = AutoHelper::getMonthIndo($x).' '.$i;
                    $yearLabel[($multiple * 12) + $x] = $i;
                }
            }
            $multiple++;
        }
        $ftMa = [];
        $ad = [];
        $err = [];
        $rsfe = [];
        $kae = [];
        $mad = [];
        $n = 0;
        $ts = [];
        foreach ($data as $key => $dt) {
            if ($key > $ft) {
                $n++;
                //forecast
                for ($i=($key - 1); $i >= $key - $ft; $i--) {
                    $ftMa[$key] = @$ftMa[$key] + @$data[$i];
                }
                $ftMa[$key] = @$ftMa[$key] / $ft;


                //absolute deviation / absolute error
                $ad[$key] = abs($data[$key] - $ftMa[$key]);

                //error kuadrat
                $ek[$key] = pow(($data[$key] - $ftMa[$key]), 2);

                //forecast error
                $err[$key] = round($data[$key] - $ftMa[$key], 2);

                //RSFE
                $rsfe[$key] = @$rsfe[$key - 1] + $err[$key];

                //komulatife absolute error
                $kae[$key] = @$kae[$key - 1] + $ad[$key];

                //mean absolute deviation
                $mad[$key] = round(@$kae[$key] / $n, 2);

                // tracking signal
                $ts[$key] = 0;
                if ($mad[$key] != 0) {
                    $ts[$key] = $rsfe[$key] / $mad[$key];
                }
            }
        }

        $labels = [];
        $actuals = [];
        $predictions = [];
        foreach ($data as $key => $dt) {
            if($key > $ft) {
                if($yearLabel[$key] == $year) {
                    $labels[] = @$monthLabel[$key];
                    $actuals[] = (isset($dt))?$dt:0;
                    $predictions[] = (isset($ftMa[$key]))?round($ftMa[$key], 2):0;
                }
            }
        }
        $chart = new ReportChart;
        $chart->height(500);
        $chart->labels($labels);
        $chart->dataset('Penjualan Aktual', 'line', $actuals)->options([
            'color' => '#2962ff',
            'backgroundColor' => '#2962ff',
            'fill' => '#2962ff',
            'borderColor' => '#2962ff'
        ]);
        $chart->dataset('Hasil Peramalan', 'line', $predictions)->options([
            'color' => '#7460ee',
            'backgroundColor' => '#7460ee',
            'fill' => '#7460ee',
            'borderColor' => '#7460ee'
        ]);

        return view('sale-reports.index', compact(
            'data', 
            'ftMa', 
            'ad', 
            'err', 
            'rsfe', 
            'kae', 
            'mad', 
            'ts', 
            'ft', 
            'monthLabel', 
            'ek',
            'years',
            'year',
            'yearLabel',
            'chart'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
