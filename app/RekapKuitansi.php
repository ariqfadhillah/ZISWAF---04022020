<?php

namespace App;

use App\Amil;
use App\Muzakki;
use App\Petugas;
use Illuminate\Database\Eloquent\Model;

class RekapKuitansi extends Model
{
    protected $table = 'kuitansi';
    protected $fillable = ['tgl_setor','number_kuitansi','nama_penyetor','alamat_penyetor','muzakki_id','amil_id','zakat_id','petugas_id'];

    public function muzakki()
    {
      return $this->belongsToMany(Muzakki::class);
      // artinya model ini dimiliki oleh class yang didlm kurung
    }

    public function amil()
    {
      return $this->belongsToMany(Amil::class);
      // artinya model ini dimiliki oleh class yang didlm kurung
    }

    public function zakat()
    {
      return $this->belongsToMany(Zakat::class);
      // artinya model ini dimiliki oleh class yang didlm kurung
    }

    public function petugas()
    {
      return $this->belongsToMany(Petugas::class);
      // artinya model ini dimiliki oleh class yang didlm kurung
    }
}
