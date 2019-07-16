<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class ImageSlider extends Eloquent
{
	protected $table = 'image_slider';
	protected $fillable = ['url', 'caption'];



}