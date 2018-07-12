@extends('layouts.master')
@section('title', 'View a ticket')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
            <div class="well well bs-component">
                @if (session('data_update'))
                    <div class="alert alert-success">
                        The ticket {{ \Session::get('data_update') }} has been updated!
                    </div>
                @endif
                <div class="content">
                    <h2 class="header">{!! $selectedTicket->title !!}</h2>
                    <p> <strong>Status</strong>: {!! $selectedTicket->status ? 'Pending' : 'Answered' !!}</p>
                    <p> {!! $selectedTicket->content !!} </p>
                </div>
                <a href="{{ route('tickets.edit', ['id' => $selectedTicket->id]) }}" class="btn btn-info">Edit</a>
                {{-- <a href="{{ route('tickets.destroy', ['id' => $selectedTicket->id]) }}" class="btn btn-info">Delete</a> --}}
                {{ Form::open(['method' => 'DELETE', 'route' => ['tickets.destroy', $selectedTicket->id], 'style' => 'display: inline']) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </div>
    </div>

@endsection