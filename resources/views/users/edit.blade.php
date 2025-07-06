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
                        <li class="breadcrumb-item active" aria-current="page">Ubah</li>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Data Pengguna
                </div>
                <div class="card-body">
                    {!! Form::model($user, ['method' => 'PUT', 'class' => 'form-horizontal', 'role' => 'form', 'enctype'=>'multipart/form-data', 'route' => ['users.update', 'user' => $user->id]]) !!}
                        <div class="form-group row">
                            {!! Form::label('name', 'Nama',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('name', null, ['class' => 'form-control'.($errors->has('name')?' is-invalid':''), 'placeholder' => 'Nama', 'required' => 'required']) !!}
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        <div class="form-group row">
                            {!! Form::label('email', 'Email',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::email('email', null, ['class' => 'form-control'.($errors->has('email')?' is-invalid':''), 'placeholder' => 'Surel', 'required' => 'required']) !!}
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">Batal</a>

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