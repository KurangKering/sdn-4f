<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Photo extends Eloquent
{
	protected $table = 'photos';
	protected $fillable = ['album_photo_id', 'caption', 'url'];

	public function album_photo()
	{
		return $this->belongsTo(new AlbumPhoto());
	}
}