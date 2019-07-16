<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Pengguna extends Eloquent
{
	protected $table = 'users';
	protected $fillable = ['username', 'nama', 'email', 'password', 'role'];


	 /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	 protected $hidden = [
	 	'password',
	 ];

	// public $timestamps = false;
	}