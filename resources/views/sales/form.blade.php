<div class="form-group row">
    {!! Form::label('year', 'Tahun', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {!! Form::select('year', $years, null, ['class' => 'form-control', 'placeholder' => 'Tahun', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('month', 'Bulan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {!! Form::select('month', $months, null, ['class' => 'form-control', 'placeholder' => 'Bulan', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('qty', 'Pax', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('qty', null, ['class' => 'form-control number', 'placeholder' => 'Pax', 'required' => 'required']) !!}
    </div>
</div> 
<div class="form-group row">
    <div class="col-md-12">
        <a href="{{ route('sales.index') }}" class="btn btn-sm btn-secondary">Batal</a>

        {!! Form::submit('Simpan', ['class' => 'btn btn-sm btn-primary pull-right']) !!}
    </div>
</div> 