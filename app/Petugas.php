<?php

namespace App;

use App\RekapKuitansi;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
 protected $table = 'petugas';
 protected $fillable = ['id','nama_petugas','user_id',];

 public function rekapkuitansi()
 {
  return $this->hasMany(RekapKuitansi::class);
    	// artinya model ini memiliki banyak data dari class yang didalam kurung digunain di table parent (foreign key user_id)
 }
 public function user()
 {
  return $this->belongsToMany(User::class);
    	// artinya model ini dimiliki oleh class yang didlm kurung
    	// digunain ditable penyambung (yang punya foreign key)
 }
 public function getAvatar()
    {
    	if(!$this->avatar){
    		return asset('images/default.jpg');
    	}

    	return asset('images/'.$this->avatar);
    }
}
