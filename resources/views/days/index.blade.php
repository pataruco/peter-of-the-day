@extends('layouts.app')


@section('content')
    @include('days.partials.add')
    <main class="container calendar">
        <div class="row">
            <section id="js-calendar-container" class="col-md-8 col-md-offset-2 col-xs-12">

            </section>
        </div>
    </main>
@endsection
