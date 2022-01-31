@extends('layouts.app')

@section('content')
<style>
.card img {
  height: 280px;
  width: 100%;
  object-fit: cover;
  position: relative;
  overflow: hidden;
}
.geser{
    padding-right: 50px;
    bottom: 20px;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
  <center><h1>Welcome D'Artha</h1></center>
  <div class="container">
    <p>Silahkan pilih Kategori</p>
    <div class="card-group">
    <!-- Looping -->
    @foreach($category as $c)
    <div class="geser"></div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $c->name }}</h5>
        <p class="card-text">{{ $c->description }}</p>
        <p class="card-text">Rp {{ $c->price }}</p>
        <p class="card-text"><small class="text-muted"><i class="fa fa-tags"></i> {{ $c->name }}</small></p>
        <a href="{{ route('beli', $c->id) }}"><button type="button" class="btn btn-success">Beli {{ $c->name }}</button></a>
      </div>
    </div>
    @endforeach
    <p></p>
  </div>
@endsection
