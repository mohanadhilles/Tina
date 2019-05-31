@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.manage-live.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.manage-live.fields.url')</th>
                            <td field-key='url'>{{ $manage_live->url }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.manage-live.fields.validate')</th>
                            <td field-key='validate'>{{ $manage_live->validate }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.manage_lives.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


