<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class KomentarBerita extends Eloquent
{
	protected $table = 'komentar_berita';
	protected $fillable = ['berita_id', 'komentar', 'nama', 'email'];

	public function berita()
	{
		return $this->belongsTo(new Berita());
	}

	// public $timestamps = false;
}