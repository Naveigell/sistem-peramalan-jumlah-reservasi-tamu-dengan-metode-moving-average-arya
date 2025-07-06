@extends('layouts.matrix-admin.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">User</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Location</li>
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
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Data User
                </div>
                <div class="card-body">
                    {!! Form::open(['class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data', 'route' => 'masters.users.location']) !!}
                        <div class="form-group row">
                            {!! Form::label('location_id', 'Location',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::select('location_id', $locations, null, ['class' => 'form-control select-normal '.($errors->has('location_id')?' is-invalid':''), 'placeholder' => '-- Pilih Lokasi --', 'required' => 'required']) !!}
                                @error('location_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <a href="{{ route('dashboard') }}" class="btn btn-sm btn-secondary">Kembali</a>
                        
                                {!! Form::submit('Simpan', ['class' => 'btn btn-sm btn-primary pull-right']) !!}
                            </div>
                        </div> 
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection