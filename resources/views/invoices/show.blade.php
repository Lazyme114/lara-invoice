@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header"> Invoice Number: {{ $invoice->invoice_number }}</div>
				<div class="card-body">
					<div class="container">

					</div>
				</div>
			</div>
		</div>
	</div>

	@endsection

