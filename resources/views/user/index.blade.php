@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">View User</div>
                <div class="card-body">

                    <a href="user/create" class="btn btn-primary">Create user</a>
                    @if(count($users) > 0)
                        <div class="col-md-12">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Edit / Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                <a href="user/{{$user->id}}/edit" class="btn btn-warning">Edit</a>
                                                {!! Form::open(['action' => ['UserController@destroy', $user->id], 'class'=>'pull-right']) !!}
                                                    {{Form::hidden('_method','DELETE')}}
                                                    {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                                                {!! Form::close() !!}
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
