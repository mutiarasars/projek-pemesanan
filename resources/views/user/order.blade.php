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
    <div class="card-group">
    <!-- Looping -->
    @foreach($total_order as $p)
    <div class="geser"></div>
    <div class="card">
      <img src="/images/products/sample/{{ $p->photo }}" class="card-img-top" alt="{{ config('app.name', 'Laravel') }}">
      <div class="card-body">
        <h5 class="card-title">{{ $p->name_product }}</h5>
        <p class="card-text">qty : {{ $p->qty }}</p>
        <p class="card-text">Rp {{ $p->total }}</p>
        <p class="card-text">warna {{ $p->warna }}</p>
        <p class="card-text">ukuran {{ $p->ukuran }}</p>
        <p class="card-text">custom {{ $p->uk_panjang }} {{ $p->uk_lingkar }} {{ $p->uk_pinggang }} {{ $p->uk_lengan }} {{ $p->uk_pundak }}</p>
        <p class="card-text"><small class="text-muted"><i class="fa fa-tags"></i> {{ $p->categories->name }}</small></p>
        <a href="{{ route('user.order.edit', $p->id) }}"><button type="button" class="btn btn-success">Edit</button></a>
      </div>
    </div>
    @endforeach
    <p></p>
  </div>
  <!-- paginate -->
  <div style="display:flex;justify-content:center;margin-top:25px;">
    {{ $total_order->links() }}
  </div>
@endsection
