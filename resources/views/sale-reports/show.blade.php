<div class="form-group row">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {{ $baby->name }}
    </div>
</div> 
<div class="form-group row">
    {!! Form::label('sex', 'Sex', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {{ $baby->sex_text }}
    </div>
</div> 
<div class="form-group row">
    {!! Form::label('birth_date', 'Birth Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {{ $baby->birth_date->format('d M Y') }}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('weight', 'Weight', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {{ $baby->weight }}
    </div>
</div> 
<div class="form-group row">
    {!! Form::label('mother_name', 'Mother Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {{ $baby->mother_name }}
    </div>
</div> 
<div class="form-group row">
    {!! Form::label('father_name', 'Father Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
        {{ $baby->father_name }}
    </div>
</div> 