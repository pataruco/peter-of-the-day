<time>{{ $day->date }}</time>

<ul>
    @foreach ($files as $file)
        <li>
            <img src="{{ $file->url }}" alt="">
        </li>
    @endforeach
</ul>
