<div class="form-group row">
    {!! Form::label('date', 'Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {{ $sale->date_string }}
    </div>
</div> 
<div class="form-group row">
    {!! Form::label('name', 'Nama', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {{ $sale->name }}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('name', 'Jumlah', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {{ $sale->qty }}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('country', 'Negara', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {{ $sale->country }}
    </div>
</div> 
<div class="form-group row">
    {!! Form::label('date_in', 'Date In', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {{ $sale->date_in_string }}
    </div>
</div> 
<div class="form-group row">
    {!! Form::label('date_out', 'Date Out', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {{ $sale->date_out_string }}
    </div>
</div> 