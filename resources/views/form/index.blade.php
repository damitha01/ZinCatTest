@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 section-block">
            <div class="card">
                <div class="card-header">Create Form</div>
                <div class="card-body form-block">
                    {!! Form::open(['action' => 'FormController@store']) !!}
                        <div class="col-md-6 form-col">
                            <div class="form-group">
                                {{Form::label('name','Name')}}
                                {{Form::text('name','',['class' => 'form-control', 'placeholder'=> 'Form Name'])}}
                            </div>
                        </div>
                        <div class="col-md-6 form-col">
                            <div class="form-group">
                                {{Form::label('url','URL')}}
                                {{Form::text('url','',['class' => 'form-control', 'placeholder'=> 'URL'])}}
                            </div>
                        </div>
                        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

        <div class="col-md-12 section-block">
            <div class="card">
                <div class="card-header">View Forms</div>
                <div class="card-body">
                    @if(count($forms) > 0)
                        <div class="col-md-12 data-view-table">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Form Name</th>
                                        <th>URL</th>
                                        <th>Edit / Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($forms as $form)
                                        <tr>
                                            <td>{{$form->name}}</td>
                                            <td>
                                                <a href="{{$form->url}}" target="_blank">{{$form->url}}</a>
                                            </td>
                                            <td>
                                                <div class="edit-section">
                                                    <a href="form/{{$form->id}}/edit" class="btn btn-warning editbtn">Edit</a>
                                                    {!! Form::open(['action' => ['FormController@destroy', $form->id], 'class'=>'pull-right']) !!}
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
                        <P>No forms added.!</P>

                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
