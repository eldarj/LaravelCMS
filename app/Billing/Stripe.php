<?php


namespace App\Billing;

class Stripe {

	protected $key;

	function __construct($key)
	{
		$this->key = $key;
	}
}