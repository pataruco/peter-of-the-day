<div class="form-group">
    {{ Form::label('date', 'Date') }}
    {{ Form::date('date', ( isset( $day ) ) ? $day->date : \Carbon\Carbon::now() ), ['class' => 'form-control'] }}
</div>

<div class="form-group">
    {{ Form::label('files[]', ( isset( $day ) ) ? 'Add more files' : 'Choose Files' ) }}
    {{ Form::file('files[]',  [ 'multiple' => true ] ) }}
</div>
