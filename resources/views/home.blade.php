@extends('layouts.app')

@section('content')
<style>
  .bawah{
    padding: 48px;
  }
</style>
<div class="bawah"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ Str::limit(Auth::user()->name, 15) }}</strong> Selamat Datang, Silakan pilih menu!
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <p></p>
                    <ul>
                        <a href="{{ route('pesan')}}"><li>Pesan</li></a>
                        <a href="{{ route('user.order')}}"><li>Pesananku</li></a>
                        <a href="{{ route('user.order.ambil')}}"><li>Bayar atau ambil</li></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
