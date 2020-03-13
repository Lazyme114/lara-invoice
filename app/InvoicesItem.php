<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoicesItem extends Model
{
	protected $fillable = [
		// 'invoice_id', 'product_id', 'name', 'quantity', 'price',
		'invoice_id', 'name', 'quantity', 'price',
	];
}
