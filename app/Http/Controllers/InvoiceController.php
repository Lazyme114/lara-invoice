<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
	public function create()
	{
		return view('invoices.create');
	}

	public function store(Request $request)
	{
		dd($request->all());
	}
}
