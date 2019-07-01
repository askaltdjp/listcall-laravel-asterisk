@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 style="padding-top: 5px; display: inline-block;">Dashboard</h3> 
                    <a href="{{ route('main-import') }}" class="btn btn-primary float-right" title="">Import List</a>
                </div>

                <div class="card-body">

                    <strong style="display: block; margin-bottom: 10px; overflow: hidden;">Call again</strong>

                    <table class="table">
                        <thead> 
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phonenumber</th>
                            <th scope="col">Text</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                          </tr> 
                        </thead>
    
                        @if(count($getCall) == 0)

                            <p>There are no call back items</p>

                        @else

                            @foreach ($getCall as $data)
        
                            <tbody>
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->phonenumber}}</td>
                                    <td>pending</td>
                                    <td><a href="{{ route('main-list', $data->id) }}">[view]</a></td>
                                </tr>
                            </tbody>

                            @endforeach

                        @endif
    
                    </table>    

                    <strong style="display: block; margin-bottom: 10px; overflow: hidden;">Call List <a href="{{ route('download') }}" class="btn btn-warning float-right" title="download">Export to CSV</a></strong>
                    
                    <table class="table">
                        <thead> 
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phonenumber</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>

                        @if(count($getList) == 0)

                            <p>There are no call items</p>

                        @else

                            @foreach ($getList as $data)
        
                            <tbody>
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->phonenumber}}</td>
                                    <td>pending</td>
                                    <td><a href="{{ route('main-list', $data->id) }}">[view]</a></td>
                                </tr>
                            </tbody>

                            @endforeach

                        @endif
                        
    
                    </table>    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
