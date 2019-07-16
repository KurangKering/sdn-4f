<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Pengaturan extends Eloquent
{
	protected $table = 'pengaturan';
	protected $fillable = ['nama', 'nilai', 'keterangan'];




}