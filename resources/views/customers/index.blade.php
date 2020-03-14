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

					<a href="{{ route('customers.create') }}" class="btn btn-primary">
						Add New Customer
					</a>
					<div class="row clearfix">
						<div class="col-md-12">
							<table class="table table-stripped">
								<thead>
									<tr>
										<th>Name</th>
										<th>Address</th>
										<th>PostCode</th>
										<th>City</th>
										<th>State</th>
										<th>Country</th>
										<th>Phone</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>
									@foreach($customers as $customer)
									<tr>
										<td>
											{{ $customer->name }}
										</td>
										<td>
											{{ $customer->address }}
										</td>
										<td>
											{{ $customer->postcode }}
										</td>
										<td>
											{{ $customer->city }}
										</td>
										<td>
											{{ $customer->state }}
										</td>
										<td>
											{{ $customer->country }}
										</td>
										<td>
											{{ $customer->phone }}
										</td>
										<td>
											{{ $customer->email }}
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
