@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
         <h1 style="text-align:center;">Ambil barang</h1>
         <p>Sessuaikan apa yang mau dikeluarkan datanya
         ikuti kode bawahnya tinggal get nama kolom di table Checkouts
        contoh : variable ch -> nama kolom </p>
         <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Kode unik</th>
                <th scope="col">name product</th>
                <th scope="col">qty</th>
              </tr>
            </thead>
            <tbody>
            @forelse($total_checkout as $ch)
              <tr>
                <td>{{ $ch->kode_unik }}</td>
                <td>{{ $ch->name_product }}</td>
                <td>{{ $ch->qty }}</td>
              </tr>
            </tbody>
            @empty
            @endforelse
          </table>
        </div>
      </div>
    </div>
    {{ $total_checkout->links() }}
</div>
@endsection
