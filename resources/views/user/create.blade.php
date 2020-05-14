@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create User</div>

                <div class="card-body">

                    {!! Form::open(['action' => 'UserController@store']) !!}
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('name','Name')}}
                                {{Form::text('name','',['class' => 'form-control', 'placeholder'=> 'User Name'])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('email','Email')}}
                                {{Form::text('email','',['class' => 'form-control', 'placeholder'=> 'User Email'])}}
                            </div>
                        </div>
                        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
