@extends('admin.navbar.navbar')

@section('content')
<div class="container-fluid mt--6">
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
			<div class="section-body">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>nama produk</th>
										<th>kategori</th>
										<th>name user</th>
										<th>telp user</th>
										<th>alamat</th>
										<th>photo</th>
										<th>description</th>
										<th>warna</th>
										<th>uk_panjang</th>
										<th>uk_lingkar</th>
										<th>uk_pinggang</th>
										<th>uk_lengan</th>
										<th>uk_pundak</th>
										<th>total</th>
									</tr>
								</thead>
									<tbody>
										@php $no = 1; @endphp
										@forelse($od_list as $row)
										<tr class="text-nowrap">
											<td>{{ $loop->iteration }}</td>
											<td>{{ $row->name_product }}</td>
											<td>{{ $row->categories->name }}</td>
											<td>{{ $row->nama_user }}</td>
											<td>{{ $row->no_telpon }}</td>
											<td>{{ $row->alamat }}</td>
											<td><img src="/images/products/sample/{{ $row->photo }}" style="width: 100px;"></td>
											<td>{{ $row->description }}</td>
											<td>{{ $row->warna }}</td>
											<td>{{ $row->uk_panjang }}</td>
											<td>{{ $row->uk_lingkar }}</td>
											<td>{{ $row->uk_pinggang }}</td>
											<td>{{ $row->uk_lengan }}</td>
											<td>{{ $row->uk_pundak }}</td>
											<td>{{ $row->total }}</td>
										</tr>
										@empty
										<tr>
											<td colspan="7" class="text-center">Empty</td>
										</tr>
										@endforelse
									</tbody>
								</table>
							</div>
							{{ $od_list->links() }}
						</div>
					</div>
				</div>
	</div>
@endsection