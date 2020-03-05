<?php

namespace App;

use App\RekapKuitansi;
use Illuminate\Database\Eloquent\Model;

class Muzakki extends Model
{
    protected $table = 'muzakki';
    protected $fillable = ['nama_muzakki'];

    public function RekapKuitansi()
    {
    	return $this->hasMany(RekapKuitansi::class);
    	// artinya model ini memiliki banyak data dari class yang didalam kurung
    }
}
