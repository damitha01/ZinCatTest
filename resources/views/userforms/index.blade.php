@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 section-block">
            <div class="card">
                <div class="card-header">Create User Forms</div>
                <div class="card-body form-block">
                    {!! Form::open(['action' => 'UserFormController@store']) !!}
                        <div class="col-md-6 form-col">
                            <div class="form-group">
                                {!! Form::Label('user', 'User') !!}
                                <select name="user" id="user" class="form-control">
                                    <option value="-1">Select a user</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" >{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 form-col">
                            <div class="form-group">
                                {{Form::label('forms', 'Forms')}}
                                <select multiple="multiple" name="forms[]" id="forms" class="form-control">
                                    @foreach($forms as $form)
                                        <option value="{{$form->id}}" >{{$form->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

        <div class="col-md-12 section-block">
            <div class="card">
                <div class="card-header">View User Forms</div>
                <div class="card-body">
                    @if(count($users) > 0)
                        @foreach($users as $user)

                            @if(count($user->forms)>0)
                                <h4>{{$user->name}} ({{$user->email}})</h4>
                                <div class="col-md-12 data-view-table">
                                    <table class="table table-stripped">
                                        <thead>
                                            <tr>
                                                <th>Form Name</th>
                                                <th>URL</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user->forms as $form)                                       
                                                <tr>
                                                    <td>{{$form->name}}</td>
                                                    <td>
                                                        <a href="{{$form->url}}" target="_blank">{{$form->url}}</a>
                                                    </td>
                                                    <td>
                                                        <div class="edit-section">
                                                            {!! Form::open(['action' => ['UserFormController@destroy', $form->userformId[0]->id], 'class'=>'pull-right']) !!}
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
                            @endif
                        @endforeach
                        
                    @else
                        <P>No forms added.!</P>

                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
