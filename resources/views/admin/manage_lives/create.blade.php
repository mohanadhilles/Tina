@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.manage-live.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.manage_lives.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('url', trans('quickadmin.manage-live.fields.url').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('url', old('url'), ['class' => 'form-control', 'placeholder' => 'enter the youtube url', 'required' => '']) !!}
                    <p class="help-block">enter the youtube url</p>
                    @if($errors->has('url'))
                        <p class="help-block">
                            {{ $errors->first('url') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('validate', trans('quickadmin.manage-live.fields.validate').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('validate'))
                        <p class="help-block">
                            {{ $errors->first('validate') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('validate', '1', false, ['required' => '']) !!}
                            Valid
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('validate', '0', false, ['required' => '']) !!}
                            Not Valid
                        </label>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

