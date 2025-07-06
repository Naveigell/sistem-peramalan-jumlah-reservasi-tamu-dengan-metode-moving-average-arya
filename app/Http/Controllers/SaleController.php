<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Sale;
use Facades\App\Helpers\AutoHelper;
use Yajra\DataTables\Facades\DataTables;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sales.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $start = Carbon::now()->subYears(10);
        $end = Carbon::now()->addYear();
        $years = [];
        for ($i=$start->format('Y'); $i <= $end->format('Y'); $i++) { 
            $years[$i] = $i;
        }
        $months = AutoHelper::getAllMonth();
        return view('sales.create', compact('years', 'months'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBabyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleRequest $request)
    {
        $sale = $this->validationSale($request)->get();
        if($sale->count()) {
            return redirect()->back()->with('error', 'Data Sudah Ada')->withInput();
        }
        $month = $request->month - 1;
        $year = $request->year;
        if($month - 1 == 0) {
            $month = 12;
            $year--;
        }
        $sale = Sale::where('month', $month)->where('year', $year)->get();
        if(!$sale->count()) {
            return redirect()->back()->with('error', 'Data '.AutoHelper::getMonthIndo($month).' '.$year.' Belum Diinputkan')->withInput();
        }
        $sale = new Sale;
        $this->saveData($sale, $request);
        return redirect()->route('sales.index')->with('status', 'Data Has Been Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $baby
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        $start = Carbon::now()->subYears(10);
        $end = Carbon::now()->addYear();
        $years = [];
        for ($i=$start->format('Y'); $i <= $end->format('Y'); $i++) { 
            $years[$i] = $i;
        }
        $months = AutoHelper::getAllMonth();
        return view('sales.edit', [
            'sale' => $sale,
            'years' => $years,
            'months' => $months
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSaleRequest  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $saleData = $this->validationSale($request)
                    ->where('id', '<>', $sale->id)
                    ->get();
        if($saleData->count()) {
            return redirect()->back()->with('error', 'Data Alredy Exists');
        }
        $this->saveData($sale, $request);
        return redirect()->route('sales.index')->with('status', 'Data Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('status', 'Data Has Been Deleted');
    }

    public function validationSale($request)
    {
        return Sale::where('year', $request->year)
                    ->where('month', $request->month);
    }

    public function saveData($sale, $request)
    {
        $sale->month = $request->month;
        $sale->year = $request->year;
        $sale->qty = str_replace(',','',$request->qty);
        $sale->user_id = auth()->user()->id;
        $sale->save();
        return $sale;
    }

    public function datatable()
    {
        $data = Sale::with('user')->orderBy('id', 'desc')->get();
        $datatables = DataTables::of($data);

        return $datatables->addcolumn('no', 'x')
                        ->addcolumn('action','
                            <div class="action-box">
                                <a title="Detail Data" href="#" data-id="{{ $id }}" data-toggle="modal" data-target="#showModal"><span class="btn btn-sm btn-warning"><span class="fas fa-file"></span> Detail</span></a>
                                 |
                                <a title="Ubah Data" href="{!! route("sales.edit", ["sale" => $id]) !!}"><span class="btn btn-sm btn-info"><span class="fas fa-edit"></span> Ubah</span></a>
                                 |
                                <a title="Hapus Data" class="del" href="#" onclick="delData(\'#form-del-{{ $id }}\')">
                                    <span class="btn btn-sm btn-danger"><span class="fas fa-trash"></span> Hapus</span>
                                </a>
                                <form id="form-del-{{ $id }}" action="{{ route("sales.destroy", ["sale" => $id]) }}" method="POST" style="display: none" class="form-del">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </div>
                            ')
                        ->rawColumns(['action'])
                        ->make(true);
    }
}
