@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="row">
            <div class="col-md-12">
                <time>{{ $day->date }}</time>
                @can('update', $day )
                    <a class="btn btn-default" href="{{ route('days.edit', [ 'id' => $day->id ] ) }}">Edit</a>
                @endcan
                {{--  --}}
                @can('delete', $day)
                    {!!  Form::open(['route' => ['days.destroy', $day->id], 'method' => 'delete'] ) !!}
                        {{ Form::submit('Delete Day', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                @endcan
            </div>
        </section>

        <section class="row">
            <div class="col-md-12">
                @if ( !empty( $images ) )
                    <h2>Images</h2>
                    <ul class="js-slick-slider-main">
                        @foreach ($images as $image)
                            <li>
                                <img class="" src="{{ $image->url }}" alt="">
                            </li>
                        @endforeach
                    </ul>

                    <ul class="js-slick-slider-nav">
                        @foreach ($images as $image)
                            <li>
                                <img class="img-responsive" src="{{ $image->url }}" alt="">
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>

        <section class="row">
            <div class="col-md-12">
                @if ( !empty( $videos) )
                    <h2>Videos</h2>
                    <ul>
                        @foreach ($videos as $video)
                            <a href="#{{ $video->id }}" class="js-modaal">Show</a>
                            <div id="{{ $video->id }}" style="display:none;">
                                <video src="{{ $video->url }}" controls>

                                </video>
                            </div>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
    </main>
@endsection
