<section class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            @can('create', App\Day::class)
                <a class="btn btn-primary" href="{{ route('days.create') }}">Add a new day</a>
            @endcan
        </div>
    </div>
</section>
