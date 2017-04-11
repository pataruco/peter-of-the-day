@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit</div>
                        <div class="panel-body">

                            {!!  Form::open(['route' => ['days.update', $day->id], 'method' => 'put', 'files' => true, 'class' => 'form-horizontal form-custom'] ) !!}
                                @include('days.form')

                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-5 col-xs-12">

                                        {{ Form::submit('Update Day', ['class' => 'btn btn-primary']) }}
                                    </div>
                                </div>

                            {{ Form::close() }}

                            @include('errors.error-bag')
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="row">
            <div class="col-md-12">
                @if ( !empty( $images ) )
                    <h2 class="col-md-12">Images</h2>
                    <ul class="assets">
                        @foreach ($images as $image)
                            <li class="col-md-2">
                                <img src="{{ $image->url }}" alt="" class="img-rounded img-responsive">
                                {!!  Form::open(['route' => ['files.destroy', $image->id], 'method' => 'delete'] ) !!}
                                    <button type="submit" name="button">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
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
                            <li class="col-md-2">
                                <video src="{{ $video->url }}" controls>

                                </video>
                                {!!  Form::open(['route' => ['files.destroy', $video->id], 'method' => 'delete'] ) !!}
                                    <button type="submit" name="button">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                {{ Form::close() }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
@endsection
