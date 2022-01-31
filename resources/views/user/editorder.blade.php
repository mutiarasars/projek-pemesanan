@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                  @if(session('ok'))
          						<div class="alert alert-primary">
          							{!! session('ok') !!}
          						</div>
          				@endif
                    <form method="POST" action="{{ route('user.order.update', $order->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="product" class="col-md-4 col-form-label text-md-right">{{ __('No hp') }}</label>

                            <div class="col-md-6">
                              <input id="no_telpon" type="number" class="form-control @error('no_telpon') is-invalid @enderror" name="no_telpon" value="{{ $order->no_telpon }}" required autocomplete="no_telpon" autofocus>

                                @error('no_telpon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                              <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $order->alamat }}" required autocomplete="alamat" autofocus>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product" class="col-md-4 col-form-label text-md-right">{{ __('Ukuran') }}</label>

                            <div class="col-md-6">
                              <select name="ukuran" class="form-control @error('ukuran') is-invalid @enderror" value="{{ old('ukuran') }}" required="required">
                     					  <option value="ukuran">- Choose ukuran -</option>
                     							<option value="S">S</option>
                                  <option value="M">M</option>
                                  <option value="L">L</option>
                                  <option value="XL">XL</option>
                                  <option value="XLL">XLL</option>
                     				  </select>

                                @error('ukuran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>

                            <div class="col-md-6">
                              <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ old('category_id') }}" required="required">
                     					  <option value="">- Choose Category -</option>
                     							<option value="{{ $order->id }}">{{ $order->categories->name }}</option>
                     				  </select>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="qty" class="col-md-4 col-form-label text-md-right">{{ __('qty') }}</label>

                            <div class="col-md-6">
                              <input id="input1" type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ $order->qty }}" required autocomplete="qty" autofocus  onkeyup="multiplication()";>
                                @error('qty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product" class="col-md-4 col-form-label text-md-right">{{ __('Nama pesanan') }}</label>

                            <div class="col-md-6">
                              <input id="name_product" type="text" class="form-control @error('name_product') is-invalid @enderror" name="name_product" value="{{ $order->name_product }}" required autocomplete="name_product" autofocus>

                                @error('name_product')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Sample photo') }}</label>

                            <div class="col-md-6">
                              <input type="file" name="photo" class="form-control" id="customFile" />

                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

                            <div class="col-md-6">
                              <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $order->description }}" required autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="warna" class="col-md-4 col-form-label text-md-right">{{ __('warna') }}</label>

                            <div class="col-md-6">
                              <input id="warna" type="text" class="form-control @error('warna') is-invalid @enderror" name="warna" value="{{ $order->warna }}" required autocomplete="warna" autofocus>

                                @error('warna')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="uk_panjang" class="col-md-4 col-form-label text-md-right">{{ __('uk_panjang') }}</label>

                            <div class="col-md-6">
                              <input id="uk_panjang" type="number" class="form-control @error('uk_panjang') is-invalid @enderror" name="uk_panjang" value="{{ $order->uk_panjang }}" required autocomplete="uk_panjang" autofocus>

                                @error('uk_panjang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="uk_lingkar" class="col-md-4 col-form-label text-md-right">{{ __('uk_lingkar') }}</label>

                            <div class="col-md-6">
                              <input id="uk_lingkar" type="number" class="form-control @error('uk_lingkar') is-invalid @enderror" name="uk_lingkar" value="{{ $order->uk_lingkar }}" required autocomplete="uk_lingkar" autofocus>

                                @error('uk_lingkar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="uk_pinggang" class="col-md-4 col-form-label text-md-right">{{ __('uk_pinggang') }}</label>

                            <div class="col-md-6">
                              <input id="uk_pinggang" type="number" class="form-control @error('uk_pinggang') is-invalid @enderror" name="uk_pinggang" value="{{ $order->uk_pinggang }}" required autocomplete="uk_pinggang" autofocus>

                                @error('uk_pinggang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="uk_pundak" class="col-md-4 col-form-label text-md-right">{{ __('uk_pundak') }}</label>

                            <div class="col-md-6">
                              <input id="uk_pundak" type="number" class="form-control @error('uk_pundak') is-invalid @enderror" name="uk_pundak" value="{{ $order->uk_pundak }}" required autocomplete="uk_pundak" autofocus>

                                @error('uk_pundak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="uk_lengan" class="col-md-4 col-form-label text-md-right">{{ __('uk_lengan') }}</label>

                            <div class="col-md-6">
                              <input id="uk_lengan" type="number" class="form-control @error('uk_lengan') is-invalid @enderror" name="uk_lengan" value="{{ $order->uk_lengan }}" required autocomplete="uk_lengan" autofocus>

                                @error('uk_lengan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                              <input id="input2" type="number" class="form-control @error('price') is-invalid @enderror" name="" value="{{ $order->categories->price }}" required autocomplete="price" autofocus readonly onkeyup="multiplication();">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total" class="col-md-4 col-form-label text-md-right">{{ __('Total') }}</label>

                            <div class="col-md-6">
                              <input id="input3" type="decimal" class="form-control @error('total') is-invalid @enderror" name="total" value="input3" required autocomplete="total" autofocus readonly>

                                @error('total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('EDIT') }}
                                </button>

                                    <a class="btn btn-link" href="{{ route('index') }}">
                                        {{ __('Cancel') }}
                                    </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function multiplication() {
      var txtFirstNumberValue = document.getElementById('input1').value;
      var txtSecondNumberValue = document.getElementById('input2').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('input3').value = result;
      }
}
</script>
@endsection
