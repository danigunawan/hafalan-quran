<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('nilai', 'Nilai', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('nilai', array('a' => 'Amat Bagus', 'b' => 'Bagus',  'c' => 'Cukup', 'd' => 'Kurang'),null,array('class' => 'form-control')) !!}
{!! $errors->first('nilai', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>