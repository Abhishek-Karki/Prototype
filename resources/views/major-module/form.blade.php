<div class="form-group {{ $errors->has('major_id') ? 'has-error' : ''}}">
    {!! Form::label('major_id', 'Major Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('major_id', $major->id, [ 'readonly','class' => 'form-control']) !!}
        {!! $errors->first('major_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('module_id') ? 'has-error' : ''}}">
    {!! Form::label('module_id', 'Module Id',['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{--{!! Form::number('module_id', null, ['class' => 'form-control']) !!}--}}
        {{--<select class="form-control" name="module_id">
            @foreach($modules as $module)
                <option value="{{$module}}">{{$module}}</option>
            @endforeach
        </select>--}}
        {{--{{ Form::select('Modules', $modules) }}--}}
        {!! Form::select('module_id', $modules, '--Select Module--', ['id' => 'module','class' => 'form-control', 'placeholder' => '--Select Module--']) !!}
        {!! $errors->first('module_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

<script type="text/javascript">
    $("#module").select2({
        allowClear:true
    });
</script>
