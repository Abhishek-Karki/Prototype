@extends('layouts.main')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title" style="padding:12px 0px;font-size:25px;"><strong>Import Student</strong></h3>
        </div>
        <div class="panel-body">

            <h3>Import File Form:</h3>
            <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('import-student-into-db') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

                <input type="file" name="sample_file" />
                {{ csrf_field() }}
                <br/>

                <button class="btn btn-primary">Import</button>

            </form>
            <br/>
        </div>
    </div>
</div>
@endsection