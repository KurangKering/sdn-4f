<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class DataGuruPegawai extends Eloquent
{
	protected $table = 'data_guru_pegawai';
	protected $fillable = ['nama', 'jabatan'];


}