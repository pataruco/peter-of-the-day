{{ Form::open( [ 'route' => 'days.store', 'files' => true ] ) }}

    @include('days.form')

    {{ Form::submit('Add Days') }}

{{ Form::close() }}

@include('errors.error-bag')
