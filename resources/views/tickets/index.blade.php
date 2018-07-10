@extends('layouts.master')
@section('title', 'View all tickets')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Ticket System </h2>
                </div>
                @if (session('data_store'))
                    <div class="alert alert-success">
                        Your ticket has been created! Its unique id is: {{ \Session::get('data_store')->id }}
                    </div>
                @elseif (session('data_delete'))
                    <div class="alert alert-success">
                        The ticket {{ \Session::get('data_delete') }} has been deleted!
                    </div>
                @endif
                <div>
                    <a href="{{ route('tickets.create') }}" type="button" class="btn btn-primary"> Add new ticket </a>
                </div>
                @if ($tickets->isEmpty())
                    <p> There is no ticket.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>{!! $ticket->id !!} </td>
                                    <td>{!! $ticket->title !!}</td>
                                    <td>{!! $ticket->status ? 'Pending' : 'Answered' !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>

@endsection