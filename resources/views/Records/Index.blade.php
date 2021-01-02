@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h2 class="text-center" style="font-weight:bold;text-decoration:underline">
        Records Of Work Covered For the Year <?php echo date('Y') ?>
    </h2>
    <div class="row">
        <div class="col-sm-6">
            <h2 class="text-center">
                Add New Record for <span class="text-danger" style="text-decoration: underline">{{Auth::user()->schoolName}}</span>
            </h2>
            @if(Session::has('success'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{Session::get('success') }}
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{Session::get('error') }}
            </div>
            @endif
            <form action="{{route('records.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Date" class="label-control">
                                <i class="fa fa-book"></i> Subject
                            </label>
                            <br>
                           <span style="color:red"> @error('Subject')
                            {{$message}}
                            @enderror</span>
                            <select name="Subject" id="" class="form-control @error('Subject')
                            is-invalid
                            @enderror">
                                <option label="--Select Subject--"></option>
                                @foreach($Subject as $key)
                                <option value="{{$key->subjectName}}">{{$key->subjectName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Date" class="label-control">
                                <i class="fa fa-building-o"></i> Class
                            </label>
                            <br>
                            <span style="color:red">  @error('Class')
                            {{$message}}
                            @enderror </span>
                            <select name="Classs" id="" class="form-control @error("Classs") is-invalid @enderror">
                                <option label="--Select Class--"></option>
                                @foreach($Class as $key)
                                <option value="{{$key->className}}">{{$key->className}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Date" class="label-control">
                                <i class="fa fa-calendar"></i> Date
                            </label>
                            <br>
                            <span style="color:red"> @error('Date') {{$message}} @enderror </span>
                            <input type="date" name="Date"  class="form-control @error('Date')
                            is-invalid
                            @enderror">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Date" class="label-control">
                                <i class="fa fa-calendar"></i> Week
                            </label>
                            <br>
                            <span style="color:red"> @error('Week') {{$message}} @enderror</span>
                            <select name="Week" id="" class="form-control @error('Week') is-invalid @enderror">
                                <option label="--Select Lesson--"></option>
                                @foreach($CurrentWeek as $key)
                                <option value="{{$key->Week}}">{{$key->Week}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Date" class="label-control">
                                <i class="fa fa-align-center"></i> Lesson Number
                            </label>
                            <br>  <span style="color:red">  @error('Lesson') {{$message}} @enderror</span>
                            <input type="number" name="Lesson"  class="form-control @error('Lesson')
                            is-invalid
                            @enderror">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Date" class="label-control">
                                <i class="fa fa-list"></i> Lesson Topic
                            </label>
                            <br>   <span style="color:red"> @error('Topic') {{$message}} @enderror</span>
                            <select name="Topic" id="" class="form-control @error('Topic') is-invalid @enderror">
                                <option label="--Select Topic--"></option>
                                @foreach($Topics as $key)
                                <option value="{{$key->topic}}">{{$key->topic}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Date" class="label-control">
                                <i class="fa fa-list"></i> Lesson References
                            </label>
                            <br>   <span style="color:red">  @error('Reference') {{$message}} @enderror </span>
                            <textarea name="Reference" id="summernote2" cols="30" rows="10" class="form-control @error('Reference')
                            is-invalid
                            @enderror"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Date" class="label-control">
                                <i class="fa fa-list"></i> Lesson Remarks
                            </label>
                            <br>   <span style="color:red">  @error('Remarks') {{$message}} @enderror </span>
                            <textarea name="Remarks" id="summernote1" cols="30" rows="10" class="form-control @error('Remarks')
                            is-invalid
                            @enderror"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-block">
                    Add Record
                </button>
            </form>
        </div>
        <div class="col-sm-6">
            <h2 class="text-center">
                Available Records Of Work
            </h2>
            <!--Add A table here -->
            <div class="table-responsive">
                <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <th>Date</th>
                        <th>Week</th>
                        <th>Lesson</th>
                        <th>Topic</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($Records as $key)
                        <tr>
                            <td>{{$key->Date}}</td>
                            <td>{{$key->Week}}</td>
                            <td>{{$key->Lesson}}</td>
                            <td>{{$key->Topic}}</td>
                            <td>{!! $key->Remarks !!}</td>
                            <td>
                                <a href="{{route('record.print')}}" class="fa fa-print" title="Edit"></a>
                                <a href="{{route('this.delete',[$key->id])}}" class="fa fa-trash-o text-danger" title="delete"></a>
                                <a href="{{route('records.show',[$key->id])}}" class="fa fa-eye text-success" title="View"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
