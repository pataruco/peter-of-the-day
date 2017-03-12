{{ Form::model( $day, [ 'route' => [ 'days.update', $day ], 'files' => true ] ) }}

    @include('days.form')

    {{ Form::submit('Update Day') }}

{{ Form::close() }}

@include('errors.error-bag')
