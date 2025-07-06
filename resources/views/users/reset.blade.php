@extends('layouts.matrix-admin.app')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Pengguna</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Perbahrui Kata Sandi</li>
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
                    Data Pengguna
                </div>
                <div class="card-body">
                    {!! Form::open(['class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data', 'route' => 'masters.users.reset']) !!}
                        <div class="form-group row">
                            {!! Form::label('old_password', 'Kata Sandi Lama',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::password('old_password', ['class' => 'form-control'.($errors->has('old_password')?' is-invalid':''), 'placeholder' => 'Old Password', 'required' => 'required']) !!}
                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('password', 'Kata Sandi',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::password('password', ['class' => 'form-control'.($errors->has('password')?' is-invalid':''), 'placeholder' => 'Passsword', 'required' => 'required']) !!}
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        <div class="form-group row">
                            {!! Form::label('password_confirmation', 'Ulangi Kata Sandi',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Passsword', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
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