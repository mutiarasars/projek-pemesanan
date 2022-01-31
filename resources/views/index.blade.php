@extends('layouts.app')

@section('content')
<style>
.card img {
  height: 350px;
  width: 100%;
  object-fit: cover;
  position: relative;
  overflow: hidden;
  }

  .geser{
    padding-right: 50px;
    bottom: 20px;
  }

  .responsive {
    width: 100%;
    height: auto;
  }

  .responsive-img {
    max-width:100%;
    display:block;
    height:auto;
  }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
  <center><h1>D'Artha Konveksi</h1></center>
  <div class="container position-relative">
    <div class="row align-items-center">
      <div class="col-md-5 col-lg-6 order-md-1 pt-8"><img class="img-fluid" src="/images/products/sample/logoda.png" alt="Logo D'Artha Konveksi" /></div>
      <div class="col-md-7 col-lg-6 text-center text-md-start pt-5 pt-md-9">
        <p align ="right">D'Artha KONVEKSI adalah perusahaan konveksi yang berdiri sejak 2018 yang melayani pembuatan berbagai jenis seragam, pakaian formal/non formal, dan produk fashion lainnya. Berbekal pengalaman lebih dari 3 tahun di bidang konveksi, maka D'Artha KONVEKSI telah mempunyai standar operasi dan menjunjung tinggi kualitas serta kepuasan konsumen terhadap setiap produk yang dihasilkan.</p>
      </div>
    </div>
  </div>
  <div class="container-lg">
        <div class="col-auto text-center">
          <hr class="mx-auto text-dark" style="height:2px;width:50px" />
          <p>visi dari D'Atha Konveksi adalah memberikan fasilitas kepada para owner small bisnis untuk mempermudah mereka mencari jasa jahit yang berkualitas dan dengan harga yang terjangkau dengan komitmen kuat dan didukung oleh tenaga yang ahli di bidangnya, maka kerapian, ketelitian, dan kecepatan menjadikan kami perusahaan paling professional di bidangnya.</p>

          <right><h2>Visi :</h2></right>
          <p>Menjadi perusahaan konveksi tercepat dan terbesar di Indonesia.</p>
          <Left><h2>Misi :</h2></Left>
          <p>Memberikan layanan prima pada setiap customer.</p>
          <p>Mengutamakan kualitas dan profesionalitas.</p>
          <p>Menyediakan produk dan jasa yang inovatif dan kreatif.</p>
          <p>Selalu melakukan peningkatan di bidang SDM, Produk maupun mitra baik di bidang mutu, keharmonisan
          untuk kelangsungan perusahaan.</p>
          
        <div class="py-3">
        </div>
        <a name="event"></a>
        <div class="container-lg">
        <div class="col-auto text-center">
          <h2 class="fw-bold">Gallery</h2>
          <hr class="mx-auto text-dark" style="height:2px;width:50px" />

          <div class="row h-100 justify-content-center pt-6">
            <div class="col-12 col-sm-9 col-md-4 mt-4">
              <!-- <a href ="https://seccodeid.com/assets/img/illustrations/logo3.png"> -->
              <div class="card h-100 rounded-3 shadow"><img class="responsive-img" src="/images/products/sample/celana.jfif"></a>
                <div class="card-body p-4 text-center text-md-start">
                  <h2 class="fw-bold">CELANA</h2>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-9 col-md-4 mt-4">
              <!-- <a href ="https://seccodeid.com/assets/img/illustrations/logo3.png"> -->
              <div class="card h-100 rounded-3 shadow"><img class="responsive-img" src="/images/products/sample/kemeja.png"></a>
                <div class="card-body p-4 text-center text-md-start">
                  <h2 class="fw-bold">KEMEJA</h2>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-9 col-md-4 mt-4">
              <!-- <a href ="https://seccodeid.com/assets/img/illustrations/logo3.png"> -->
              <div class="card h-100 rounded-3 shadow"><img class="responsive-img" src="/images/products/sample/baju anak.jpeg"></a>
                <div class="card-body p-4 text-center text-md-start">
                  <h2 class="fw-bold">BAJU ANAK</h2>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-9 col-md-4 mt-4">
              <!-- <a href ="https://seccodeid.com/assets/img/illustrations/logo3.png"> -->
              <div class="card h-100 rounded-3 shadow"><img class="responsive-img" src="/images/products/sample/rok.jpeg"></a>
                <div class="card-body p-4 text-center text-md-start">
                  <h2 class="fw-bold">ROK</h2>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-9 col-md-4 mt-4">
              <!-- <a href ="https://seccodeid.com/assets/img/illustrations/logo3.png"> -->
              <div class="card h-100 rounded-3 shadow"><img class="responsive-img" src="/images/products/sample/POLO.png"></a>
                <div class="card-body p-4 text-center text-md-start">
                  <h2 class="fw-bold">POLO</h2>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-9 col-md-4 mt-4">
              <!-- <a href ="https://seccodeid.com/assets/img/illustrations/logo3.png"> -->
              <div class="card h-100 rounded-3 shadow"><img class="responsive-img" src="/images/products/sample/celanaw.jpeg"></a>
                <div class="card-body p-4 text-center text-md-start">
                  <h2 class="fw-bold">CELANA WANITA</h2>
                </div>
              </div>
            </div> -->
          <div class="py-3"></div>
          <div class="container">
            <div class="py-3"></div>
            <h2>Layanan Kami</h2>
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
          </div>`
  <!-- paginate -->
@endsection
