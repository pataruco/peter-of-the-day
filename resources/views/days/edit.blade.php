@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="row">
            <div class="col-md-10 col-md-offset-1 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Edit</h3>
                    </div>
                        <div class="panel-body">

                            {!!  Form::open(['route' => ['days.update', $day->id], 'method' => 'put', 'files' => true, 'class' => 'form-horizontal form-custom'] ) !!}
                                @include('days.form')

                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10 col-xs-12">
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

        <section class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-xs-12">
                    @if ( !empty( $images ) )
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="">Images</h3>
                            </div>
                            <div class="panel-body">
                                    <ul class="assets row">
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
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <section class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-xs-12">
                    @if ( !empty( $videos) )
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>Video</h3>
                            </div>
                                <ul class="col-md-12">
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
                        </div>
                    @endif
                </div>
            </div>
        </section>

    </main>
@endsection
