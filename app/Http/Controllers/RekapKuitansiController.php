<?php

namespace App\Http\Controllers;

use App\Amil;
use App\Jenis_Ziswaf;
use App\Petugas;
use App\RekapKuitansi;
use App\Satuan_Ziswaf;
use DB;
use Illuminate\Http\Request;

class RekapKuitansiController extends Controller
{
    public function index()
    {	
        $kuitansi = RekapKuitansi::all();
        $petugas = Petugas::all();
        $amil = Amil::all();
        $zakat = Jenis_Ziswaf::all();
    	$satuan = Satuan_Ziswaf::all();
        return view('kuitansi.index', compact('kuitansi','petugas','amil','zakat','satuan'));
    }
    
    public function boom()
    {
        // template untuk join gunakan cara ini namamodel::join saja
        // bisa menggunakan of atau pun collection
        $kuitansi = 
        RekapKuitansi::join('muzakki', 'kuitansi.muzakki_id', '=', 'muzakki.id')
        ->join('amil', 'kuitansi.amil_id', '=', 'amil.id')
        ->join('petugas', 'kuitansi.petugas_id', '=', 'petugas.id')
        ->join('zakat', 'kuitansi.zakat_id', '=', 'zakat.id')
        ->join('jenis_ziswaf', 'zakat.jenis_ziswaf', '=', 'jenis_ziswaf.id')
        ->join('satuan_ziswaf', 'zakat.satuan_ziswaf', '=', 'satuan_ziswaf.id')
        ->select('kuitansi.tgl_setor','kuitansi.number_kuitansi','kuitansi.nama_penyetor','kuitansi.alamat_penyetor','muzakki.nama_muzakki', 'amil.nama_amil', 'petugas.nama_petugas','zakat.nilai_ziswaf', 'satuan_ziswaf.satuan_ziswaf', 'jenis_ziswaf.jenis_ziswaf')
        ->get();

        // $kuitansi= RekapKuitansi::select('kuitansi.*');
        // print_r($kuitansi);
        // dd($kuitansi);
        
        return \DataTables::collection($kuitansi) 
        ->addColumn('tgl_setor', function($s){
            return $s->tgl_setor;

        })
        ->addColumn('number_kuitansi', function($s){
            return $s->number_kuitansi;
            
        })
        ->addColumn('nama_penyetor', function($s){
            return $s->nama_penyetor;
            
        })
        ->addColumn('alamat_penyetor', function($s){
            return $s->alamat_penyetor;
            
        })

        // >>>>> dari sini udah manggil id dari foreign lain 
        ->addColumn('nama_muzakki', function($s){
            return $s->nama_muzakki;
            
        })
        ->addColumn('name_amil', function($s){
            return $s->name_amil;
            
        })
        ->addColumn('name_petugas', function($s){
            return $s->name_petugas;
            
        })
        
        ->addColumn('action', function($s){
            return '<a href="/kuitansi/'.$s->id.'/edit" class="btn btn-warning btn-sm">Edit</a>';
        })
        ->editColumn('delete', function($s){
            return '<a href="/kuitansi/'.$s->id.'/delete" class="btn btn-danger btn-sm delete" id ='.$s->id.' >Delete</a>';
        })
        ->rawColumns(['delete','action','nama_petugas'])
        ->make();
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'number_kuitansi' => 'required|max:255|unique:kuitansi',
            'nilai_ziswaf' => 'required|email|max:255|',
            'nama_penyetor' => 'required|min:6',
        ]);

        $kuitansi = new \App\RekapKuitansi;
        $kuitansi->number_kuitansi = $request->number_kuitansi;
        $kuitansi->nama_petugas = $request->nama_petugas;
        $kuitansi->nama_amil = $request->nama_amil;
        $kuitansi->jenis_ziswaf = $request->jenis_ziswaf;
        $kuitansi->satuan_ziswaf = $request->satuan_ziswaf;
        $kuitansi->nilai_ziswaf = $request->nilai_ziswaf;
        $kuitansi->nama_penyetor = $request->nama_penyetor;
        $kuitansi->nama_muzakki = $request->nama_muzakki;

        dd($request->all());
        return ;
    }
}
