@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="row">
            <div class="col-md-12 text-right">
                @can('create', App\Day::class)
                    <a class="btn btn-default" href="{{ route('days.create') }}">Add a new day</a>
                @endcan
            </div>
        </section>

        <section id="js-calendar-container">

        </section>
    </main>
@endsection
