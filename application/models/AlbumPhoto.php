<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class AlbumPhoto extends Eloquent
{
	protected $table = 'album_photo';
	protected $fillable = ['title', 'description', 'cover'];


	
	public function photos()
	{
		return $this->hasMany(new Photo());
	}


}