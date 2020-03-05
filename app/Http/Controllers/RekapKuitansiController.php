<?php

namespace App\Http\Controllers;

use App\RekapKuitansi;
use Illuminate\Http\Request;

class RekapKuitansiController extends Controller
{
    public function index()
    {	
    	$kuitansi = RekapKuitansi::all();
        return view('kuitansi.index', compact('kuitansi'));
    }

    public function get()
    {
        $kuitansi= RekapKuitansi::select('kuitansi.*');
        
        return \DataTables::eloquent($kuitansi)
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
        ->addColumn('nama_muzakki', function($s){
            return $s->nama_muzakki;
            
        })
        ->addColumn('nama_amil', function($s){
            return $s->nama_amil;
            
        })
        ->addColumn('nama_petugas', function($s){
            return $s->nama_petugas;
            
        })
        ->addColumn('jenis_ziswaf', function($s){
            return $s->jenis_ziswaf;
            
        })
        ->addColumn('nilai_ziswaf', function($s){
            return $s->nilai_ziswaf;
            
        })
        ->addColumn('satuan_ziswaf', function($s){
            return $s->satuan_ziswaf;
            
        })
        ->addColumn('action', function($s){
            return '<a href="/kuitansi/'.$s->id.'/edit" class="btn btn-warning btn-sm">Edit</a>';
        })
        ->editColumn('delete', function($s){
            return '<a href="/kuitansi/'.$s->id.'/delete" class="btn btn-danger btn-sm delete" id ='.$s->id.' >Delete</a>';
        })
        ->rawColumns(['delete','action','nama_petugas'])
        ->toJson();
    }
}
