<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class StrukturOrganisasi extends Eloquent
{
	protected $table = 'struktur_organisasi';
	protected $fillable = ['nama', 'jabatan'];


}