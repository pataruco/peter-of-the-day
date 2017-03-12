{!!  Form::model($day, ['route' => ['days.update', $day->id], 'method' => 'put', 'files' => true] ) !!}
    @include('days.form')

    {{ Form::submit('Update Day') }}

{{ Form::close() }}

@include('errors.error-bag')

@if ( isset( $images ) )
    <h2>Images</h2>
    <ul>
        @foreach ($images as $image)
            <li>
                <img src="{{ $image->url }}" alt="">
            </li>
        @endforeach
    </ul>
@endif

@if ( isset( $videos) )
    <h2>Video</h2>
    <ul>
        @foreach ($videos as $video)
            <video src="{{ $video->url }}" controls>

            </video>
        @endforeach
    </ul>
@endif
