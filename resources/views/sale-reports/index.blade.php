@extends('layouts.matrix-admin.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Laporan Reservasi</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Laporan Reservasi</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            Laporan Reservasi
                        </div>
                        <div class="col-6">
                            {!! Form::open(['method' => 'GET']) !!}
                            {!! Form::select('year', $years, $year, ['class' => 'form-control select-normal', 'id' => 'year', 'style' => 'width:100%', 'onchange' => 'this.form.submit()']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover  display nowrap"  style="width:100%" id="baby-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Bulan</th>
                                <th>Reservasi Aktual</th>
                                <th>Hasil Peramalan</th>
                                {{-- <th>Error Kuadrat</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                                $totalMse = 0;
                                $countMse = 0;
                            @endphp
                            @foreach ($data as $key => $dt)
                                @if (($key > $ft))
                                    @if($yearLabel[$key] == $year)
                                    @php
                                        $no++;
                                    @endphp
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ @$monthLabel[$key] }}</td>
                                        <td align="center">{{ (isset($dt))?$dt:0 }}</td>
                                        <td align="center">{{ (isset($ftMa[$key]))?number_format($ftMa[$key], 2):0 }}</td>
                                        {{-- <td align="center">{{ (isset($ek[$key]))?number_format($ek[$key], 2):0 }}</td> --}}
                                    </tr>
                                    @endif
                                    @php
                                        if(($key + 1) <= count($data)) {
                                            if(isset($ek[$key])) {
                                                $totalMse += $ek[$key];
                                            }
                                            else {
                                                $totalMse += 0;
                                            }
                                            $countMse++;
                                        }
                                    @endphp
                                @endif    
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="col-md-6">
                        <table class="table table-striped table-hover  display nowrap"  style="width:100%" id="baby-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Jumlah MSE</th>
                                    <th>{{ number_format($totalMse / $countMse, 2) }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="col" style="max-height: 250px">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}
@endpush