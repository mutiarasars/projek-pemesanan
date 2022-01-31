@extends('admin.navbar.navbar')

@section('content')
<style>
  .bot{
    padding-bottom: 45px;
  }
</style>
<section>
    <div class="container">
      <div class="bot"></div>
        @if(session('ok'))
						<div class="alert alert-primary">
							{!! session('ok') !!}
						</div>
				@endif
    <form action="{{ route('admin.categories.send') }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('post')
        <div class="form-group">
          <label for="exampleInputEmail1">Nama kategori</label>
          <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="">
          @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">price</label>
          <input type="number" class="form-control" id="price" name="price" aria-describedby="price" placeholder="">
          @error('price')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">description</label>
          <textarea type="text" class="form-control" id="=description" name="description" aria-describedby="description" placeholder=""></textarea>
          @error('description')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
  </div>
</section>
@endsection
