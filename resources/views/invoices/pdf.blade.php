@extends('layouts.pdf')

@section('content')
<div class="clearfix">
	@if(config('invoices.logo_file') != '')
	<div class="text-center">
		<img src="{{ asset(config('invoices.logo_file')) }}" alt="">
	</div>
	@endif

	<div class="text-center">
		<b>Invoice {{ $invoice->invoice_number }}</b>
		<br>
		{{  $invoice->invoice_date }}
	</div>
</div>

<div class="clearfix mt-3">
	<div class="float-left">
		<b>To:</b> {{  $invoice->customer->name }}
		<br /><br />
		<b>Address</b>
		{{ $invoice->customer->address }}

		@if($invoice->customer->postcode != '')
		, {{ $invoice->customer->postcode }}
		@endif
		, {{ $invoice->customer->city }}

		@if($invoice->customer->state != '')
		, {{ $invoice->customer->state }}
		@endif
		, {{ $invoice->customer->country }}

		@if($invoice->customer->phone != '')
		<br /><br /> <b>Phone: </b> {{ $invoice->customer->phone }}
		@endif

		@if($invoice->customer->email != '')
		<br /><br /> <b>Email: </b> {{ $invoice->customer->email }}
		@endif

		@if($invoice->customer->customer_fields)
		@foreach($invoice->customer->customer_fields as $customer_field)
		<br /><br/ ><b>{{ $customer_field->field_key }}: </b> {{ $customer_field->field_value }} 
		@endforeach
		@endif
	</div>
</div>

<div class="clearfix mt-3">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th class="text-center"> # </th>
				<th class="text-center"> Product </th>
				<th class="text-center"> Qty </th>
				<th class="text-center"> Price </th>
				<th class="text-center"> Total </th>
			</tr>
		</thead>
		<tbody>
			@foreach($invoice->invoice_items as $item)
			<tr>
				<td>
					{{ $loop->iteration }}
				</td>
				<td>
					{{ $item->name }}
				</td>
				<td>
					{{ $item->quantity }}
				</td>
				<td>
					{{ $item->price }}
				</td>
				<td>
					{{ $item->quantity * $item->price }}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<div class="clearfix mt-3">
	<table class="float-right table table-bordered">
		<tbody>
			<tr>
				<th class="text-center">Sub Total</th>
				<td class="text-center">
					{{ number_format($invoice->total_amount, 2) }}
				</td>
			</tr>
			<tr>
				<th class="text-center">Tax</th>
				<td class="text-center">
					{{ $invoice->tax_percent }} %
				</td>
			</tr>
			<tr>
				<th class="text-center">Tax Amount</th>
				<td class="text-center">
					{{ number_format(($invoice->total_amount * $invoice->tax_percent / 100) ,2) }}
				</td>
			</tr>
			<tr>
				<th class="text-center">Grand Total</th>
				<td class="text-center">
					{{ number_format($invoice->total_amount + ($invoice->total_amount * $invoice->tax_percent / 100), 2) }}
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="clearfix mt-3">
	{{ config('invoices.footer_text') }}
</div>

@endsection