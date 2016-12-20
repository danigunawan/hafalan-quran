@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li class="active"><a href="{{ url('/quran/hafalan') }}">Hafalan</a></li>
<li class="active">Beri Nilai</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Beri Nilai</h2>
</div>
<div class="panel-body">
{!! Form::model($hafalan, ['url' => route('hafalan.update', $hafalan->id),
'method'=>'put', 'class'=>'form-horizontal']) !!}
@include('hafalan._form_beri_nilai')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection
