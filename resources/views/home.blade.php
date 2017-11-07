@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Dashboard
        <small>Class Schedule</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="box box-primary">
        <div class="box-header">
            <ol class="breadcrumb">
                <li><a href="{{ route('home')}}"><i class="fa fa-photo"></i> Time Schedule</a></li>
            </ol>
            <div class="row">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message}}
                    </div>
                    @endif

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ $message}}
                    </div>
                    @endif
                </div>

            </div>
        </div>
        <!-- /.box-header -->
        <div class="">

            <div id="schedule">
                <div class="cd-schedule loading">
                    <div class="timeline">
                        <ul>
                            @foreach ($timeframes as $timeframe)
                                <li><span>{{$timeframe}}</span></li>
                            @endforeach
                        </ul>
                    </div> <!-- .timeline -->

                    <div class="events">
                        <ul>
                            
                            @foreach ($schedules as $day => $schedule)
                            <li class="events-group">
                                <div class="top-info"><span><b>{{$day}}</b></span></div>
                                <ul>
                                    @foreach ($schedule as $items)
                                    <li class="single-event {{$items->classes->color}}" data-start="{{$items->classes->start}}" data-end="{{$items->classes->to}}"
                                        data-content="event-abs-circuit" data-event="event-1">
                                        <a href="#0">
                                            <em class="event-name">{{$items->classes->title}}</em>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="event-modal">
                        <header class="header">
                            <div class="content">
                                <span class="event-date"></span>
                                <h3 class="event-name"></h3>
                            </div>
                            <div class="header-bg"></div>
                        </header>

                        <div class="body">
                            <div class="event-info" style="text-align: center">
                                <p class="text-muted" style="padding: 50px;">Some class information goes here</p>
                            </div>
                            <div class="body-bg"></div>
                        </div>
                        <a href="#0" class="close">Close</a>
                    </div>
                    <div class="cover-layer"></div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</section>
@endsection
@section('modulescripts')
<script src="{{ asset('plugins/scheduler/js/modernizr.js') }}"></script>
<script src="{{ asset('plugins/scheduler/js/scheduler.js') }}"></script>
<script src="{{ asset('js/modules/schedule.js') }}"></script>
@stop