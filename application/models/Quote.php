<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Quote extends Eloquent
{
	protected $table = 'quotes';
	protected $fillable = ['quote', 'oleh'];


	 

	// public $timestamps = false;
	}