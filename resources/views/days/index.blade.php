@can('create', App\Day::class)
    <a href="{{ route('days.create') }}">Add a new day</a>
@endcan

<ul>
    @foreach ($days as $day  )
        <li>
            <a href="{{ route('days.show', [ 'id' => $day->id ] ) }}">
                <time>{{ $day->date }}</time>
            </a>

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

<section id="js-calendar-container">

</section>
