<?php

namespace App\Http\Controllers;
use App\Customer;
use App\CustomerField;
use App\Invoice;
use App\InvoicesItem;
use App\Product;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
	public function create()
	{
		$customers = Customer::get(['id', 'name']);
		$products = Product::all();
		return view('invoices.create', compact('customers', 'products'));
	}

	public function store(Request $request)
	{

		$invoice = Invoice::create($request->invoice);

		for($i = 0; $i < count($request->product); $i++) {
			if(isset($request->qty[$i]) && isset($request->price[$i])) {
				InvoicesItem::create([
					'invoice_id' => $invoice->id,
					'name' => $request->product[$i],
					'quantity' => $request->qty[$i],
					'price' => $request->price[$i],
				]);
			}
		}
		
		return redirect()->route('home');
	}

	public function show($invoice_id)
	{
		$invoice = Invoice::findOrFail($invoice_id);
		return view('invoices.show', compact('invoice'));
	}

	public function download($invoice_id)
	{
		$invoice = Invoice::findOrFail($invoice_id);
		$pdf = \PDF::loadView('invoices.pdf', compact('invoice'));
		return $pdf->stream('invoide.pdf');
	}
}
