@extends('layouts.master')
@section('title', 'Contact')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            {{ Form::open(['url' => route('tickets.store'), 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'role' => 'form']) }}
                <fieldset>
                    <legend>Submit a new ticket</legend>
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-10">
                            {{ Form::text('title', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Content</label>
                        <div class="col-lg-10">
                            {{ Form::textarea('content', null, ['class' => 'form-control', 'rows' => '3']) }}
                            <span class="help-block">Feel free to ask us any question.</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {{ Form::button('Cancel', ['class' => 'btn btn-default']) }}
                            {{ Form::submit('Submit', ['class' => 'btn btn-default']) }}
                        </div>
                    </div>
                </fieldset>
            {{ Form::close() }}
        </div>
    </div>
@endsection