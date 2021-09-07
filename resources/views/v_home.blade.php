@extends('layout.v_template')
@section('title','Home')

@section('content')
<h1>Selamat Datang {{ Auth::user()->name }}</h1>
@endsection