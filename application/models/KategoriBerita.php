<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class KategoriBerita extends Eloquent
{
	protected $table = 'kategori_berita';
	protected $fillable = ['kategori'];


}