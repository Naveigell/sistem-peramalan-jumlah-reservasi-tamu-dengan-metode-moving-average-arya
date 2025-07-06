@extends('layouts.matrix-admin.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Births</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Births</a></li>
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
                    Data Births
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover  display nowrap"  style="width:100%" id="baby-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Month</th>
                                <th>Actual Demand</th>
                                <th>MA{{ $ft }} Month</th>
                                <th>Error</th>
                                <th>MAD</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($data as $key => $dt)
                                @if ($key > $ft)
                                    @php
                                        $no++;
                                    @endphp
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ @$monthLabel[$key] }}</td>
                                        <td>{{ (isset($dt))?$dt:0 }}</td>
                                        <td>{{ (isset($ftMa[$key]))?$ftMa[$key]:0 }}</td>
                                        <td>{{ (isset($err[$key]))?$err[$key]:0 }}</td>
                                        <td>{{ (isset($mad[$key]))?$mad[$key]:0 }}</td>
                                    </tr>
                                @endif    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection