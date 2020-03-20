@extends('layouts.main')
@section('content')
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <th>Filename</th>
            <th>Uploaded By</th>
            <th>Student , School</th>
            <th>Status</th>
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
                   @if( $file->Marked ==0)
                  <span style="color:red"> Not Marked</span>
                   @else
                   <span style="color:green">Marked</span>
                   @endif
                </td>
                <td>
                    <i class="fa fa-pencil"></i>&nbsp;<i class="fa fa-eye"></i>&nbsp;<i class="fa fa-trash-o"></i>&nbsp;
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop