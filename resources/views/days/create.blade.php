{{ Form::open( [ 'route' => 'days.store', 'files' => true ] ) }}

    {{ Form::label('date', 'Date') }}
    {{ Form::date('date', \Carbon\Carbon::now()) }}

    {{ Form::label('files[]', 'Choose files') }}
    {{ Form::file('files[]',  [ 'multiple' => true ] ) }}

    {{ Form::submit('Add Days') }}

{{ Form::close() }}
