<div class="form-group">
    {{ Form::label('date', 'Date', ['class' => 'col-md-2 col-xs-12 control-label']) }}
    <div class="col-md-10 col-xs-12">
        {{ Form::date('date', ( isset( $day ) ) ? $day->date : \Carbon\Carbon::now() ), ['class' => 'form-control'] }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('files[]', ( isset( $day ) ) ? 'Add files' : 'Add files', [ 'class' => 'col-md-2 col-xs-12 control-label'] )}}
    <div class="col-md-10 col-xs-12">
        {{ Form::file('files[]',  [ 'multiple' => true ] ) }}
    </div>
</div>
