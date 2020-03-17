<?php

namespace App;

use App\RekapKuitansi;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
	protected $table = 'ziswaf';
	protected $fillable = ['kuitansi_id','jenis_ziswaf_id','satuan_ziswaf_id','nilai_ziswaf','bentuk_ziswaf'];

	public function kuitansi()
    {
      return $this->belongsToMany(RekapKuitansi::class);
      // artinya model ini dimiliki oleh class yang didlm kurung
    }
}
