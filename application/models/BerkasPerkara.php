<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class BerkasPerkara extends Eloquent
{
	protected $table = 'berkas_perkara';
	protected $fillable = ['perkara_id', 'nama', 'file'];

	public function perkara()
	{
		return $this->belongsTo('App\Perkara');
	}

	public function riwayat_pembaca()
	{
		return $this->hasMany('App\RiwayatPembaca');
	}
	// public $timestamps = false;
}