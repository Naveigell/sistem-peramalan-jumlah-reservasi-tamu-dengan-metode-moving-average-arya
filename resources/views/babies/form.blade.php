{{-- <div class="form-group row">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => 'required']) !!}
    </div>
</div>  --}}
<div class="form-group row">
    {!! Form::label('sex', 'Sex', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        <label>{!! Form::radio('sex', 0) !!} Perempuan</label>
        <label>{!! Form::radio('sex', 1) !!} Laki - Laki</label>
    </div>
</div>
<div class="form-group row">
    {!! Form::label('birth_date', 'Birth Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('birth_date', (isset($baby))?$baby->birth_date->format('d-m-Y'):null, ['class' => 'datepicker form-control', 'placeholder' => 'Birth Date', 'required' => 'required']) !!}
    </div>
</div>
{{-- <div class="form-group row">
    {!! Form::label('weight', 'Weight', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('weight', null, ['class' => 'form-control', 'placeholder' => 'Weight', 'required' => 'required']) !!}
    </div>
</div>  --}}
<div class="form-group row">
    {!! Form::label('mother_name', 'Mother Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('mother_name', null, ['class' => 'form-control', 'placeholder' => 'Mother Name', 'required' => 'required']) !!}
    </div>
</div> 
{{-- <div class="form-group row">
    {!! Form::label('father_name', 'Father Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {!! Form::text('father_name', null, ['class' => 'form-control', 'placeholder' => 'Father Name', 'required' => 'required']) !!}
    </div>
</div>  --}}
<div class="form-group row">
    <div class="col-md-12">
        <a href="{{ route('babies.index') }}" class="btn btn-sm btn-secondary">Cancel</a>

        {!! Form::submit('Save', ['class' => 'btn btn-sm btn-primary pull-right']) !!}
    </div>
</div> 