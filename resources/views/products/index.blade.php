@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Customers</div>

				<div class="card-body">
					@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
					@endif

					<a href="{{ route('products.create') }}" class="btn btn-primary">
						Add New Product
					</a>
					<div class="row clearfix">
						<div class="col-md-12">
							<table class="table table-stripped">
								<thead>
									<tr>
										<th>Name</th>
										<th>Price</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($products as $product)
									<tr>
										<td>
											{{ $product->name }}
										</td>
										<td>
											{{ number_format($product->price, 2) }}
										</td>
										
										
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
