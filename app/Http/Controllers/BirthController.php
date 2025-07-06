<?php

namespace App\Http\Controllers;

use Facades\App\Helpers\AutoHelper;
use Carbon\Carbon;
use App\Models\Baby;
use App\Http\Requests\StoreBabyRequest;
use App\Http\Requests\UpdateBabyRequest;
use App\Models\Birth;
use Yajra\DataTables\Facades\DataTables;

class BirthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ft = 4;

        $birthData = [];
        $births = Baby::orderBy('birth_date')->get();
        $start = 10000;
        $end = 0;
        $lastMonth = 0;
        foreach ($births as $key => $birth) {
            if ($birth->birth_date->format('Y') < $start) {
                $start = $birth->birth_date->format('Y');
            }
            if ($birth->birth_date->format('Y') > $end) {
                $end = $birth->birth_date->format('Y');
            }
            $birthData[$birth->birth_date->format('Y')][$birth->birth_date->format('n')][] = $birth;
            $lastMonth = $birth->birth_date->format('n');
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
                    $data[($multiple * 12) + $x] = (isset($birthData[$i][$x]))?count($birthData[$i][$x]):0;
                    $monthLabel[($multiple * 12) + $x] = AutoHelper::getMonthIndo($x).' '.$i;
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
        return view('births.index', compact('data', 'ftMa', 'ad', 'err', 'rsfe', 'kae', 'mad', 'ts', 'ft', 'monthLabel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('babies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBabyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBabyRequest $request)
    {
        $baby = new Baby;
        $this->saveData($baby, $request);
        return redirect()->route('babies.index')->with('status', 'Data Has Been Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Baby  $baby
     * @return \Illuminate\Http\Response
     */
    public function show(Baby $baby)
    {
        return view('babies.show', compact('baby'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Baby  $baby
     * @return \Illuminate\Http\Response
     */
    public function edit(Baby $baby)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBabyRequest  $request
     * @param  \App\Models\Baby  $baby
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBabyRequest $request, Baby $baby)
    {
        $this->saveData($baby, $request);
        return redirect()->route('babies.index')->with('status', 'Data Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Baby  $baby
     * @return \Illuminate\Http\Response
     */
    public function destroy(Baby $baby)
    {
        $baby->delete();
        return redirect()->route('babies.index')->with('status', 'Data Has Been Deleted');
    }

    public function saveData($baby, $request)
    {
        $baby->name = $request->name;
        $baby->sex = $request->sex;
        $baby->birth_date = Carbon::createFromFormat('d-m-Y', $request->birth_date);
        $baby->weight = $request->weight;
        $baby->mother_name = $request->mother_name;
        $baby->father_name = $request->father_name;
        $baby->save();
        return $baby;
    }

    public function datatable()
    {
        $data = Baby::get();
        $datatables = DataTables::of($data);

        return $datatables->addcolumn('no', 'x')
                        ->addcolumn('action','
                            <div class="action-box">
                                <a title="Show Data" href="#" data-id="{{ $id }}" data-toggle="modal" data-target="#showModal"><span class="btn btn-sm btn-warning"><span class="fas fa-file"></span> Detail</span></a>
                                 |
                                <a title="Edit Data" href="{!! route("babies.edit", ["baby" => $id]) !!}"><span class="btn btn-sm btn-info"><span class="fas fa-edit"></span> Edit</span></a>
                                 |
                                <a title="Hapus Data" class="del" href="#" onclick="delData(\'#form-del-{{ $id }}\')">
                                    <span class="btn btn-sm btn-danger"><span class="fas fa-trash"></span> Delete</span>
                                </a>
                                <form id="form-del-{{ $id }}" action="{{ route("babies.destroy", ["baby" => $id]) }}" method="POST" style="display: none" class="form-del">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </div>
                            ')
                        ->rawColumns(['action'])
                        ->make(true);
    }
}
