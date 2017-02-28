<ul>
    @foreach ($days as $day  )
        <li>
            <time>{{ $day->date }}</time>
            @foreach ( $day->files as $file )
                <ul>
                    <li>
                        <a href="{{ $file->url }}">{{ $file->name }}</a>
                    </li>

                </ul>
            @endforeach
        </li>
    @endforeach
</ul>
