<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Perkara extends Eloquent
{
	protected $table = 'perkara';
	protected $fillable = ['no_perkara', 'jenis_perkara_id'];


	public function jenis_perkara()
	{
		return $this->belongsTo('App\JenisPerkara');
	}

	public function berkas_perkara()
	{
		return $this->hasMany('App\BerkasPerkara');
	}
	// public $timestamps = false;
}