<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Video extends Eloquent
{
	protected $table = 'videos';
	protected $fillable = [ 'caption', 'url'];

}