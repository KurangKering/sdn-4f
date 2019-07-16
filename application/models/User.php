<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class User extends Eloquent
{
	protected $table = 'users';
	protected $fillable = [
		'username', 'name', 'email', 'password', 'status',
	];

	public function riwayat_pembaca()
	{
		return $this->hasMany('App\RiwayatPembaca');
	}

	// public $timestamps = false;
}