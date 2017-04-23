<section class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            @can('create', App\Day::class)
                <a class="btn btn-circle" href="{{ route('days.create') }}">
                    <span class="glyphicon glyphicon-plus"></span>
                </a>
            @endcan
        </div>
    </div>
</section>
