<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
	public function index()
	{	
		$transaksi = Transaksi::all();
		return view('transaksi_zakat.index', compact('transaksi'));
	}

	public function get()
    {
        // $transaksi= Transaksi::select('ziswaf.*');
        // karena ini table gabungan. dan perlu yang namanya join.. jadi ga bisa pakai yang diatas kita ini ya

        $transaksi = Transaksi::join('kuitansi', 'kuitansi.id', '=', 'ziswaf.kuitansi_id')
        ->join('jenis_ziswaf', 'ziswaf.jenis_ziswaf', '=', 'jenis_ziswaf.id')
        ->join('satuan_ziswaf', 'ziswaf.satuan_ziswaf', '=', 'satuan_ziswaf.id')
        ->select('jenis_ziswaf.jenis_ziswaf',
        	'satuan_ziswaf.satuan_ziswaf',
        	'ziswaf.nilai_ziswaf')
        ->get();
        return \DataTables::collection($transaksi)
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
            return '<a href="/transaksi/'.$s->id.'/edit" class="btn btn-warning btn-sm">Edit</a>';
        })
        ->editColumn('delete', function($s){
            return '<a href="/transaksi/'.$s->id.'/delete" class="btn btn-danger btn-sm delete" id ='.$s->id.' >Delete</a>';
        })
        ->rawColumns(['delete','action','nama_petugas'])
        ->toJson();
    }

}
