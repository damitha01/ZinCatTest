@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 section-block">
            <div class="card">
                <div class="card-header">Edit User</div>

                <div class="card-body form-block">

                    {!! Form::open(['action' => ['UserController@update', $user->id]]) !!}
                        <div class="col-md-6 form-col">
                            <div class="form-group">
                                {{Form::label('name','Name')}}
                                {{Form::text('name',$user->name,['class' => 'form-control', 'placeholder'=> 'User Name'])}}
                            </div>
                        </div>
                        <div class="col-md-6 form-col">
                            <div class="form-group">
                                {{Form::label('email','Email')}}
                                {{Form::text('email',$user->email,['class' => 'form-control', 'placeholder'=> 'User Email'])}}
                            </div>
                        </div>
                        <div class="col-md-6 form-col">
                            <div class="form-group">
                                {{Form::label('phone','Phone')}}
                                {{Form::text('phone',$user->phone,['class' => 'form-control', 'placeholder'=> 'Phone'])}}
                            </div>
                        </div>
                        <div class="col-md-6 form-col">
                            <div class="form-group">
                                {{Form::label('address','Address')}}
                                {{Form::text('address',$user->address,['class' => 'form-control', 'placeholder'=> 'Address'])}}
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
