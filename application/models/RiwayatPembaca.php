<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class RiwayatPembaca extends Eloquent
{
	protected $table = 'riwayat_pembaca';
	protected $fillable = ['nama_pembaca', 'user_id', 'berkas_perkara_id', 'tanggal'];


	public function berkas_perkara()
	{
		return $this->belongsTo('App\BerkasPerkara');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
	// public $timestamps = false;
}