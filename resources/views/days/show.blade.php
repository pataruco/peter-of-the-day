<time>{{ $day->date }}</time>

<h2>Video</h2>
    @if ( isset( $videos) )
    <ul>
        @foreach ($videos as $video)
            <video src="{{ $video->url }}" autoplay controls>

            </video>
        @endforeach
    </ul>
    @endif


<h2>Images</h2>

@if ( isset( $images ) )
    <ul>
        @foreach ($images as $image)
            <li>
                <img src="{{ $image->url }}" alt="">
            </li>
        @endforeach
    </ul>
@endif
