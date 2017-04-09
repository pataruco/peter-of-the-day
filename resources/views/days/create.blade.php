@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="row">
            <div class="col-md-8">

                {{ Form::open( [ 'route' => 'days.store', 'files' => true, 'class' => 'form-horizontal form-custom' ] ) }}

                    @include('days.form')
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-5">
                            {{ Form::submit('Add Day', [ 'class' => 'btn btn-primary']) }}
                        </div>
                    </div>

                {{ Form::close() }}

                @include('errors.error-bag')
            </div>
        </section>
    </main>

@endsection
