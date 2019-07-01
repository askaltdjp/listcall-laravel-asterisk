@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 style="padding-top: 5px; display: inline-block;">Dashboard</h3> 
                    <a href="{{ route('home') }}" class="btn btn-secondary float-right" title="Back">Back</a>
                </div>

                <div class="card-body">
                    
                    {!! Form::open(['action' => 'FileController@put', 'method' => 'POST']) !!}

                        @if ($errors->any())

                            <div class="alert alert-info" role="alert"> {{$errors->first()}}</div>  

                        @endif
                        
                        <div class="form-group">
                            <label for="name">Customer</label> 
                            {{Form::text('customer', $getItem->name, ['class' => 'form-control'])}}
                        </div> 

                        <div class="form-group">
                            <label for="name">Phone Number</label> 
                            {{Form::text('phone', $getItem->phonenumber, ['class' => 'form-control'])}}
                        </div> 

                        <div class="form-group">
                            <label for="name">Select</label> 
                            <label style="display: block;"><input @if ($getItem->hangup == 1) checked @endif type="checkbox" name="hangup" value="1" style="margin-right: 1em;">Hangup</label>
                            <label style="display: block;"><input @if ($getItem->callagain == 1) checked @endif type="checkbox" name="callagain" value="1" style="margin-right: 1em;">Call Again</label>
                            <label style="display: block;"><input @if ($getItem->dontcall == 1) checked @endif type="checkbox" name="dontcall" value="1" style="margin-right: 1em;">Don't Call Again</label>
                            <label style="display: block;"><input @if ($getItem->succes == 1) checked @endif type="checkbox" name="succes" value="1" style="margin-right: 1em;">Succes</label>
                        </div> 

                        <div class="form-group">
                            <label for="name">Optional</label>  
                            {{Form::textarea('text', $getItem->optional, ['class' => 'form-control', 'rows' => '5'])}}
                        </div> 

                        {{Form::hidden('listid', $getItem->id)}}                            
                        
                        <button type="submit" class="btn btn-primary float-left">Update</button>
                    
                    {!! Form::close() !!}
 
                    {!! Form::open(['action' => 'Ami\CallController@index', 'method' => 'POST']) !!}
  
                        {{Form::hidden('callid', $getItem->id)}} 

                        <button type="submit" class="btn btn-success float-right" style="color: #ffffff;">Call Customer</button>

                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
