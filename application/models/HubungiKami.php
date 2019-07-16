<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class HubungiKami extends Eloquent
{
	protected $table = 'hubungi_kami';
	protected $fillable = ['nama', 'email', 'pesan'];

	

}