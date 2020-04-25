@extends('layouts.main')
@section('content')
<div class="table-responsive">
    @if(Session::has('error'))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&timesbar;</a>
        {{ Session::get('error') }}
    </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&timesbar;</a>
        {{ Session::get('success') }}
    </div>
    @endif
    <table class="table table-striped table-hover">
        <thead>
            <th>Filename</th>
            <th>Uploaded By</th>
            <th>SUbject</th>
            <th>Student , School</th>
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
                    {{ $file->Subject }}
                </td>
                <td>
                    {{
                    $file->BelongsTo
                    }}
                </td>
                <td>
                    <a href="{{ route('file.edit',[$file->id]) }}" class="btn btn-xs btn-primary fa fa-pencil"></a>&nbsp; @if(Auth::user()->isAdmin)<a href="{{ route('file.delete',[$file->id]) }}" class="btn btn-xs btn-danger fa fa-trash-o"></a>@endif&nbsp;
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-right">
    {{$files->links()}}
</div>
</div>
 @if(Auth::user()->isInd==0 || Auth::user()->isAdmin==1)
 <div class="pull-left">
    <button class="btn btn-success" onclick="window.open('/Marked/Sheets','_parent')">
        View Institution Marked Copies
    </button>
</div>
 @endif
@stop
