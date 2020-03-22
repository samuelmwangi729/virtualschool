@extends('layouts.main')
@section('content')
<div class="table-responsive">
    <table class="table table-striped table-hover">
   <h2 class="pull-right"> Marked Sheets Under Institution</h2>
        <thead>
            <th>Filename</th>
            <th>Uploaded By</th>
            <th>School</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($files as $file)
            <tr>
                <td>
                     <a href="{{asset('/uploads/'.$file->fileName)}}">Download</a>
                </td>
                <td>
                    {{ $file->uploadedBy }}
                </td>
                <td>
                    {{ 
                    $file->BelongsTo
                    }}
                </td>
                <td>
                    <i class="fa fa-pencil"></i>&nbsp;<i class="fa fa-eye"></i>&nbsp;<i class="fa fa-trash-o"></i>&nbsp;
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-right">
    {{$files->links()}}
</div>
</div>
@stop