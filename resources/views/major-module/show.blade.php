@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $major->name }} Major : Modules</div>
                    <div class="panel-body">

                        <a href="{{ url("/majormodule/$major->id") }}" class="btn btn-success btn-sm" title="Add Module">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Module
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>Module</th><th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($modules as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>

                                        <td>
                                            {!! Form::open([
                                                'method'=>'POST',
                                                'url' => ['/majormodule/'."$major->id/$item->id"],
                                                'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'title' => 'Delete MajorModule',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {{--{!! $major->appends(['search' => Request::get('search')])->render() !!}--}} </div>
                        </div>

                        {{--<div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $major->id }}</td>
                                    </tr>
                                    <tr><th> Major Id </th><td> {{ $majormodule->major_id }} </td></tr><tr><th> Module Id </th><td> {{ $majormodule->module_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
