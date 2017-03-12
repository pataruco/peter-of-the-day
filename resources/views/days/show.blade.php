<time>{{ $day->date }}</time>

<a href="{{ route('days.edit', [ 'id' => $day->id ] ) }}">Edit</a>
{!!  Form::open(['route' => ['days.destroy', $day->id], 'method' => 'delete'] ) !!}
        {{ Form::submit('Delete Day') }}
{{ Form::close() }}



@if ( !empty( $images ) )
    <h2>Images</h2>
    <ul>
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
