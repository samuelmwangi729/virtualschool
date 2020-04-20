@extends('layouts.main')
@section('content')
<div class="container-fluid">
<h2>View My marked papers</h2>
<div class="table-responsive">
<table class="table table-responsive-sm table-primary table-bordered table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Subject</th>
            <th>Uploaded By</th>
            <th>File</th>
        </tr>
    </thead>
    <tbody>
        @foreach($papers as $paper)
            <tr>
                <?php $count=1;?>

                <td>{{ $count }}</td>
                <td>{{ $paper->Subject }}</td>
                <td>{{ $paper->uploadedBy }}</td>
                <td><a href="{{ asset('uploads/'.$paper->fileName) }}">Download</a></td>
                <?php $count=$count+1;?>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
@stop
