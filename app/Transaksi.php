<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
	protected $table = 'ziswaf';
	protected $fillable = ['kuitansi_id','jenis_ziswaf','satuan_ziswaf','nilai_ziswaf','bentuk_ziswaf'];
}
