<?php

namespace App\Http\Controllers;

use App\Jenis_Ziswaf;
use App\RekapKuitansi;
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

        $transaksi = Jenis_Ziswaf::join('ziswaf', 'ziswaf.jenis_ziswaf_id', '=', 'jenis_ziswaf.id')
        ->join('kuitansi', 'kuitansi.id', '=', 'ziswaf.kuitansi_id')
        ->join('satuan_ziswaf', 'ziswaf.satuan_ziswaf_id', '=', 'satuan_ziswaf.id')
        ->select('kuitansi.tgl_setor',
                    'kuitansi.nama_penyetor',
                    'ziswaf.nilai_ziswaf',
                    'ziswaf.bentuk_ziswaf',
                    'jenis_ziswaf.jenis_ziswaf',
                    'satuan_ziswaf.satuan_ziswaf',
                    'kuitansi.number_kuitansi' )
        // ->where('number_kuitansi', $id)
        ->get();
        return \DataTables::collection($transaksi)
        ->addColumn('tgl_setor', function($s){
            return $s->tgl_setor;
        })
        ->addColumn('nama_penyetor', function($s){
            return $s->nama_penyetor;
        })
        ->addColumn('number_kuitansi', function($s){
            return $s->number_kuitansi;
        })
        ->addColumn('jenis_ziswaf', function($s){
            return $s->jenis_ziswaf;
        })
        ->addColumn('bentuk_ziswaf', function($s){
            return $s->bentuk_ziswaf;
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
    // next saya mau buat custom fungsi total untuk tampilan transaksi
    public function information($id)
    {
    
    $data_fore = Jenis_Ziswaf::join('ziswaf', 'ziswaf.jenis_ziswaf_id', '=', 'jenis_ziswaf.id')
    ->join('kuitansi', 'kuitansi.id', '=', 'ziswaf.kuitansi_id')
    ->join('satuan_ziswaf', 'ziswaf.satuan_ziswaf_id', '=', 'satuan_ziswaf.id')
    ->select('kuitansi.tgl_setor',
    'kuitansi.nama_penyetor',
    'ziswaf.nilai_ziswaf',
    'ziswaf.bentuk_ziswaf',
    'jenis_ziswaf.jenis_ziswaf',
    'satuan_ziswaf.satuan_ziswaf',
    'kuitansi.number_kuitansi')
    ->where('number_kuitansi', $id)->distinct()
    ->get();
    
    return view('transaksi_zakat.info', compact(['data_fore']));
    }
}
