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

    <section class="pricing py-5">
        <div class="container">
            <div class="row">
                <!-- Free Tier -->
                @foreach ($tickets as $ticket)
                    <div class="col-lg-4">
                        <div class="card ticket mb-5 text-white">
                            <div class="card-body">
                                <h4 class="text-center">{{ $ticket->title }}</h4>
                                <h6 class="text-center">{{ $ticket->desc }}</h6>
                                <hr>
                                <ul class="fa-ul">
                                    <li>Created at: {{ date("Y-m-d H:m:s", (string) last(json_decode($ticket->updates))[0]) }}</li>
                                    <li>Time spent: {{ floor($ticket->seconds_spent / 3600) . ":" . floor(($ticket->seconds_spent / 60) % 60) . ":" . $ticket->seconds_spent % 60 }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <project-detail></project-detail>
@endsection
