<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Baby;
use App\Http\Requests\StoreBabyRequest;
use App\Http\Requests\UpdateBabyRequest;
use Yajra\DataTables\Facades\DataTables;

class BabyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('babies.index');
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
        // $baby->name = $request->name;
        $baby->sex = $request->sex;
        $baby->birth_date = Carbon::createFromFormat('d-m-Y', $request->birth_date);
        // $baby->weight = $request->weight;
        $baby->mother_name = $request->mother_name;
        // $baby->father_name = $request->father_name;
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
