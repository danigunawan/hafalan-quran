
@if($nilai == '' AND  $id_penghafal != $id_user)
<a href="{{ $edit_url }}">Beri Nilai</a>
@endif


@if( $id_penghafal == $id_user)
{!! Form::model($model, ['url' => $hapus_url, 'method' => 'delete', 'class' => 'form-inline'] 
) !!}
{!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close()!!}
@endif
