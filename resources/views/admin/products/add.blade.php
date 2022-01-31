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
    <form action="{{ route('admin.products.send') }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('post')
      <div class="form-group">
				<label for="">kategori</label>
				 <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ old('category_id') }}" required="required">
					<option value="">- Choose Category -</option>
						@foreach($category as $c)
							<option value="{{ $c->id }}">{{ $c->name }}</option>
						@endforeach
				 </select>
				 @error('category_id')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				 @enderror
			</div>
      <div class="form-group">
        <label for="exampleInputEmail1">nama produk</label>
          <input type="text" class="form-control" id="name_product" name="name_product" aria-describedby="name_product" placeholder="produk">
          @error('name_product')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">price</label>
          <input type="number" class="form-control" id="price" name="price" aria-describedby="price" placeholder="price">
          @error('price')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>
      <div class="form-group">
        <label for="">description</label>
					<textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" style="height: 150px" required></textarea>
					@error('description')
					  <span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
				  @enderror
      </div>
      <div class="form-group">
          <label class="form-label" for="customFile">Upload file</label>
          <input type="file" name="photo" class="form-control" id="customFile" />
      </div>
      <button type="submit" class="btn btn-primary">Upload</button>
    </form>
  </div>
</section>
@endsection
