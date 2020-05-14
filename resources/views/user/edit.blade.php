@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit User</div>

                <div class="card-body">

                    {!! Form::open(['action' => ['UserController@update', $user->id]]) !!}
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('name','Name')}}
                                {{Form::text('name',$user->name,['class' => 'form-control', 'placeholder'=> 'User Name'])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('email','Email')}}
                                {{Form::text('email',$user->email,['class' => 'form-control', 'placeholder'=> 'User Email'])}}
                            </div>
                        </div>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
