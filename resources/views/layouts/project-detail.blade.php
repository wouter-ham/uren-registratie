@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1>{{ $project[0]->title }}</h1>
                    <h3>{{ $project[0]->desc }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2>Tickets linked to: {{ $project[0]->title }}</h2>
            </div>
        </div>
        <div class="row flex-row flex-nowr">
            @foreach ($tickets as $ticket)
                <div class="col-md-3">
                    <div class="jumbotron">
                        <h2>{{ $ticket->title }}</h2>
                        <p>{{ $ticket->desc }}</p>
                        {{ date("Y-m-d H:m:s", (string) last(json_decode($ticket->updates))[0]) }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <project-detail></project-detail>
@endsection
