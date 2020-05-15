@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 section-block">
            <div class="card">
                <div class="card-header">Edit Form</div>

                <div class="card-body form-block">

                    {!! Form::open(['action' => ['FormController@update', $form->id]]) !!}
                        <div class="col-md-6 form-col">
                            <div class="form-group">
                                {{Form::label('name','Name')}}
                                {{Form::text('name',$form->name,['class' => 'form-control', 'placeholder'=> 'Form Name'])}}
                            </div>
                        </div>
                        <div class="col-md-6 form-col">
                            <div class="form-group">
                                {{Form::label('url','URL')}}
                                {{Form::text('url',$form->url,['class' => 'form-control', 'placeholder'=> 'Form URL'])}}
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
