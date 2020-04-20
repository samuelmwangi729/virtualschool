@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <h2>View Marking Schemes</h2>
    @if(Session::has('error'))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('error') }}
    </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>File</th>
                   @if(Auth::user()->isAdmin)
                   <th>Action</th>
                   @endif
                </tr>
            </thead>
            <tbody>
                @foreach($markingSchemes as $markingScheme)
                <tr>
                    <td>{{ $markingScheme->Subject }}</td>
                    <td><a href="{{ asset($markingScheme->FileName) }}">Download</a></td>
                    @if(Auth::user()->isAdmin)
                    <td><a href="#" class="fa fa-edit btn btn-primary btn-sm"></a>&nbsp;<a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
