@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="row">
            <div class="col-md-8 col-md-offset-4">

                {{ Form::open( [ 'route' => 'days.store', 'files' => true, 'class' => 'form' ] ) }}

                    @include('days.form')

                    {{ Form::submit('Add Days', [ 'class' => 'btn btn-default']) }}

                {{ Form::close() }}

                @include('errors.error-bag')
            </div>
        </section>
    </main>

@endsection
