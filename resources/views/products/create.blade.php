@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Add New Product</div>

				<div class="card-body">

					<div class="row clearfix">
						<div class="col-md-12">
							<form action="{{ route('products.store') }}" method="POST">
								@csrf

								<div class="form-group">
									Product Name: 
									<input type="text" name="name" class="form-control" required>
								</div>

								<div class="form-group">
									Product Price: 
									<input type="number" name="price" class="form-control" required>
								</div>

								<input type="submit" class="btn btn-primary" value="Add Product">

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
