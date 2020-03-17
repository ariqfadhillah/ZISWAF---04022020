<?php

namespace App\Http\Controllers;

use App\Muzakki;
use Illuminate\Http\Request;

class MuzakkiController extends Controller
{
    public function index()
    {	
    	$muzakki = Muzakki::all();
        return view('muzakki.index', compact('muzakki'));
    }

    public function get()
    {
        $muzakki= Muzakki::join('kuitansi','kuitansi.muzakki_id','=','muzakki.id')
        ->select('muzakki.nama_muzakki','kuitansi.number_kuitansi','kuitansi.tgl_setor','kuitansi.nama_penyetor')
        ->get();
        
        return \DataTables::collection($muzakki)
        ->addColumn('number_kuitansi', function($s){
            return '<a href ="/transaksi/'.$s->number_kuitansi.'/info">'.$s->number_kuitansi.'</a>';
        })
        ->addColumn('tgl_setor', function($s){
            return $s->tgl_setor;
        })
        ->addColumn('nama_penyetor', function($s){
            return $s->nama_penyetor;
        })
        ->addColumn('nama_muzakki', function($s){
            return $s->nama_muzakki;
        })
        ->addColumn('action', function($s){
            return '<a href="/muzakki/'.$s->id.'/edit" class="btn btn-warning btn-sm">Edit</a>';
        })
        ->editColumn('delete', function($s){
            return '<a href="/muzakki/'.$s->id.'/delete" class="btn btn-danger btn-sm delete" id ='.$s->id.' >Delete</a>';
        })
        ->rawColumns(['delete','action','nama_petugas','number_kuitansi'])
        ->toJson();
    }
}
