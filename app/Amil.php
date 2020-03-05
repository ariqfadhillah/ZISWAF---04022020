<?php

namespace App;

use App\RekapKuitansi;
use Illuminate\Database\Eloquent\Model;

class Amil extends Model
{
    protected $table = 'amil';
    protected $fillable = ['nama_amil',];


    public function RekapKuitansi()
    {
    	return $this->hasMany(RekapKuitansi::class);
    	// artinya model ini memiliki banyak data dari class yang didalam kurung
    }
}
