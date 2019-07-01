@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 style="padding-top: 5px; display: inline-block;">Import</h3> 
                    <a href="{{ route('home') }}" class="btn btn-secondary float-right" title="Back">Back</a>
                </div>

                <div class="card-body">
                    
                <div class="card-body">

                    {!! Form::open(['action' => 'FileController@post', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                        @if ($errors->any())

                            @foreach ($errors->all() as $error)
                                <div class="alert alert-info" role="alert"> {{$error}}</div>
                            @endforeach 

                        @elseif (session()->has('success')) 

                            <div class="alert alert-success" role="alert">{{ session('success') }}</div>

                        @endif
   
                        <div class="form-group">  
                            <label for="name">Import List</label>
                            <input type="file" name="fileupload" style="display: block;">
                        </div>

                        <button type="submit" class="btn btn-primary float-left">Submit</button>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
