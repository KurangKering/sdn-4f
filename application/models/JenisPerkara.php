<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class JenisPerkara extends Eloquent
{
	protected $table = 'jenis_perkara';
	protected $fillable = ['nama'];

	public function perkara()
	{
		return $this->hasMany('App\Perkara');
	}
	
	// public $timestamps = false;
}