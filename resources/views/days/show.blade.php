{{--  --}}

@extends('layouts.app')

@section('content')
    @include('days.partials.root')
    <main class="container slider">
        <section class="row slider__panel-top">
            <div class="col-md-10 col-md-offset-1 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6 col-xs-6">
                            <h3 class="no-margin line-height--1-5">
                                @php
                                \Carbon\Carbon::setLocale('es_ES');
                                @endphp
                                <time>{{ \Carbon\Carbon::parse( $day->date )->toFormattedDateString() }}</time>
                            </h3>
                        </div>
                        <div class="col-md-6 col-xs-6 text-align--right">
                            @can('update', $day )
                                <a class="btn btn-link" href="{{ route('days.edit', [ 'id' => $day->id ] ) }}">Edit</a>
                            @endcan

                            @can('delete', $day)
                                {!!  Form::open(['route' => ['days.destroy', $day->id], 'method' => 'delete', 'class' => 'display--inline-block', 'id' => 'delete'] ) !!}
                                    <button type="submit" class="btn btn-link" form="delete">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                {{ Form::close() }}
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-md-10 col-md-offset-1 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if ( !empty( $images ) )
                            <h3>Images</h3>
                            <ul id="js-slick-slider">
                                @foreach ($images as $image)
                                    <li>
                                        <img class="img-responsive img-rounded" src="{{ $image->url }}">
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-md-10 col-md-offset-1 col-xs-12">
                @if ( !empty( $videos) )
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Videos</h3>
                            <ul>
                                @foreach ($videos as $video)
                                    <a href="#{{ $video->id }}" class="js-modaal">Show</a>
                                    <div id="{{ $video->id }}" style="display:none;">
                                        <video src="{{ $video->url }}" controls>

                                        </video>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </section>

    </main>
@endsection
