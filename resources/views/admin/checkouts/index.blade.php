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
										<th>name product</th>
										<th>kode unik</th>
										<th>nama user</th>
										<th>no telpon</th>
										<th>alamat</th>
									</tr>
								</thead>
									<tbody>
										@php $no = 1; @endphp
										@forelse($ch_list as $row)
										<tr class="text-nowrap">
											<td>{{ $loop->iteration }}</td>
											<td>{{ $row->name_product }}</td>
                      <td>{{ $row->kode_unik }}</td>
                      <td>{{ $row->nama_user }}</td>
                      <td>{{ $row->no_telpon }}</td>
                      <td>{{ $row->alamat }}</td>
										</tr>
										@empty
										<tr>
											<td colspan="7" class="text-center">Empty</td>
										</tr>
										@endforelse
									</tbody>
								</table>
							</div>
							{{ $ch_list->links() }}
						</div>
					</div>
				</div>
	</div>
@endsection
