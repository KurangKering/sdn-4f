<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Pages extends Eloquent
{
	protected $table = 'pages';
	protected $fillable = ['title', 'isi'];


	 

	// public $timestamps = false;
	}