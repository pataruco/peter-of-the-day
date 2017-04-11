@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="row">
            <div class="col-md-10 col-md-offset-1 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">New Day</div>
                        <div class="panel-body">
                            {{ Form::open( [ 'route' => 'days.store', 'files' => true, 'class' => 'form-horizontal form-custom' ] ) }}

                                @include('days.form')
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10 col-xs-12">
                                        {{ Form::submit('Add Day', [ 'class' => 'btn btn-primary']) }}
                                    </div>
                                </div>

                            {{ Form::close() }}

                            @include('errors.error-bag')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
