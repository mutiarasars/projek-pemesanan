@extends('admin.navbar.navbar')

@section('content')
	<!-- Page content -->
	<div class="container-fluid mt--6">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-header">
            @if(session('ok'))
                <div class="alert alert-primary">
                  {!! session('ok') !!}
                </div>
            @endif
						<a href="{{ route('admin.products.add') }}"><button class="btn btn-primary" type="submit">Add products</button></a>
					 </div>
					<div class="table-responsive">
						<!-- Projects table -->
						<table class="table align-items-center table-flush">
							<thead class="thead-light">
								<tr>
									<th scope="col">#</th>
                  <th scope="col">Produk</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">photo</th>
                  <th scope="col">price</th>
                  <th scope="col">description</th>
									<th scope="col">action</th>
								</tr>
							</thead>
							<tbody>
								<!-- Loop -->
								@php $no = 1; @endphp
								@forelse($products as $row)
								<tr>
									<th scope="row">
										{{ $loop->iteration }}
									</th>
                  <td>
                    {{ $row->name_product }}
                  </td>
									<td>
										{{ $row->categories->name }}
									</td>
                  <td>
                    <img src="/images/products/{{ $row->photo }}" style="padding: 5px; width: 100px;" alt="{{ config('app.name', 'Laravel') }}">
                  </td>
                  <td>
                    {{ $row->price }}
                  </td>
                  <td>
                    {{ $row->description }}
                  </td>
									<td>
										<div class="d-flex">
											<a href="{{ route('admin.products.edit', $row->id) }}" class="btn btn-warning btn-sm mx-2"><i class="fa fa-edit"></i></a>
											<form action="{{ route('admin.products.delete', $row->id) }}" method="POST">
												@csrf
												@method('delete')
												<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
											</form>
										</div>
									</td>
								</tr>
								@empty
								<tr>
									<td colspan="8" class="text-center">Empty</td>
								</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
@endsection
