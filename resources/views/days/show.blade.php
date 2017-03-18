@extends('layouts.app')

@section('content')
    <time>{{ $day->date }}</time>

    @can('update', $day )
        <a href="{{ route('days.edit', [ 'id' => $day->id ] ) }}">Edit</a>
    @endcan
    {{--  --}}
    @can('delete', $day)
        {!!  Form::open(['route' => ['days.destroy', $day->id], 'method' => 'delete'] ) !!}
            {{ Form::submit('Delete Day') }}
        {{ Form::close() }}
    @endcan



    @if ( !empty( $images ) )
        <h2>Images</h2>
        <ul class="js-slick-slider-main">
            @foreach ($images as $image)
                <li>
                    <img src="{{ $image->url }}" alt="">
                </li>
            @endforeach
        </ul>

        <ul class="js-slick-slider-nav">
            @foreach ($images as $image)
                <li>
                    <img src="{{ $image->url }}" alt="">
                </li>
            @endforeach
        </ul>
    @endif

    @if ( !empty( $videos) )
        <h2>Video</h2>
        <ul>
            @foreach ($videos as $video)
                <video src="{{ $video->url }}" controls>

                </video>
            @endforeach
        </ul>
    @endif
@endsection
