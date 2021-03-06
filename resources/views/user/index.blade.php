@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 section-block">
            <div class="card">
                <div class="card-header">Create User</div>
                <div class="card-body form-block">
                    {!! Form::open(['action' => 'UserController@store']) !!}
                        <div class="col-md-6 form-col">
                            <div class="form-group">
                                {{Form::label('name','Name')}}
                                {{Form::text('name','',['class' => 'form-control', 'placeholder'=> 'User Name'])}}
                            </div>
                        </div>
                        <div class="col-md-6 form-col">
                            <div class="form-group">
                                {{Form::label('email','Email')}}
                                {{Form::text('email','',['class' => 'form-control', 'placeholder'=> 'Email'])}}
                            </div>
                        </div>
                        <div class="col-md-6 form-col">
                            <div class="form-group">
                                {{Form::label('phone','Phone')}}
                                {{Form::text('phone','',['class' => 'form-control', 'placeholder'=> 'Phone'])}}
                            </div>
                        </div>
                        <div class="col-md-6 form-col">
                            <div class="form-group">
                                {{Form::label('address','Address')}}
                                {{Form::text('address','',['class' => 'form-control', 'placeholder'=> 'Address'])}}
                            </div>
                        </div>
                        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

        <div class="col-md-12 section-block">
            <div class="card">
                <div class="card-header">View Users</div>
                <div class="card-body">
                    @if(count($users) > 0)
                        <div class="col-md-12 data-view-table">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>address</th>
                                        <th>phone</th>
                                        <th>Edit / Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>
                                                <div class="edit-section">
                                                    <a href="user/{{$user->id}}/edit" class="btn btn-warning editbtn">Edit</a>
                                                    {!! Form::open(['action' => ['UserController@destroy', $user->id], 'class'=>'pull-right']) !!}
                                                        {{Form::hidden('_method','DELETE')}}
                                                        {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                                                    {!! Form::close() !!}
                                                </div>
                                               
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <P>No users added.!</P>

                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
