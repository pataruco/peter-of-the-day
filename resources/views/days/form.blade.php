{{ Form::label('date', 'Date') }}
{{ Form::date('date', ( isset( $day ) ) ? $day->date : \Carbon\Carbon::now()) }}


{{ Form::label('files[]', ( isset( $day ) ) ? 'Add more files' : 'Choose Files' ) }}
{{ Form::file('files[]',  [ 'multiple' => true ] ) }}
