@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="row">
            <div class="col-md-8 col-md-offset-2">

                {!!  Form::open(['route' => ['days.update', $day->id], 'method' => 'put', 'files' => true] ) !!}
                    @include('days.form')

                    {{ Form::submit('Update Day', ['class' => 'btn btn-default']) }}

                {{ Form::close() }}

                @include('errors.error-bag')
            </div>
        </section>
        <section class="row">
            <div class="col-md-12">
                @if ( !empty( $images ) )
                    <h2>Images</h2>
                    <ul>
                        @foreach ($images as $image)
                            <li>
                                <img src="{{ $image->url }}" alt="">
                                {!!  Form::open(['route' => ['files.destroy', $image->id], 'method' => 'delete'] ) !!}
                                        {{ Form::submit('Delete Image') }}
                                {{ Form::close() }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
        <section class="row">
            <div class="col-md-12">
                @if ( !empty( $videos) )
                    <h2>Video</h2>
                    <ul>
                        @foreach ($videos as $video)
                            <video src="{{ $video->url }}" controls>

                            </video>
                            {!!  Form::open(['route' => ['files.destroy', $video->id], 'method' => 'delete'] ) !!}
                                    {{ Form::submit('Delete video') }}
                            {{ Form::close() }}
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
@endsection
