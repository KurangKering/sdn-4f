<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Berita extends Eloquent
{
	protected $table = 'berita';
	protected $fillable = ['konten', 'author_user_id', 'kategori_berita_id', 'judul', 'berita_image'];

	public function komentar_berita()
	{
		return $this->hasMany(new KomentarBerita());
	}

}