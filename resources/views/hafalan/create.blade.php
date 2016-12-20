@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }} ">Dashboard</a></li>
<li><a href="{{ url('/admin/authors') }}">Hafalan</a></li>
<li class="active">Tambah Hafalan</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Tambah Hafalan</h2>
</div>
<div class="panel-body">
{!! Form::open(['url' => route('hafalan.store'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('hafalan._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection
