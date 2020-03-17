<?php

namespace App\Http\Controllers;

use App\Amil;
use App\Jenis_Ziswaf;
use App\Muzakki;
use App\Petugas;
use App\RekapKuitansi;
use App\Satuan_Ziswaf;
use App\Transaksi;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RekapKuitansiController extends Controller
{
   public function index()
   {	
      $kuitansi = RekapKuitansi::all();
      $petugas  = Petugas::all();
      $amil     = Amil::all();
      $zakat    = Jenis_Ziswaf::all();
      $satuan   = Satuan_Ziswaf::all();
      return view('kuitansi.index', compact('kuitansi','petugas','amil','zakat','satuan'));
   }

   public function boom()
   {
      // template untuk join gunakan cara ini namamodel::join saja
      // bisa menggunakan of atau pun collection
      $kuitansi                                  = RekapKuitansi::join('muzakki', 'kuitansi.muzakki_id', '=', 'muzakki.id')
      ->join('amil', 'kuitansi.amil_id', '=', 'amil.id')
      ->join('petugas', 'kuitansi.petugas_id', '=', 'petugas.id')
      ->select('kuitansi.tgl_setor','kuitansi.number_kuitansi','kuitansi.nama_penyetor','kuitansi.alamat_penyetor','muzakki.nama_muzakki', 'amil.nama_amil', 'petugas.nama_petugas','kuitansi.id')
      ->get();
      
      // $kuitansi                               = RekapKuitansi::select('kuitansi.*');
      // print_r($kuitansi);
      // dd($kuitansi);
      
      return \DataTables::collection($kuitansi) 
      ->addColumn('tgl_setor', function($s){
      return $s->tgl_setor;

      })
      ->addColumn('number_kuitansi', function($s){
      // return '<a href ="/transaksi/'.$s->number_kuitansi.'/edit">'.$s->number_kuitansi.'</a>';
      return '<a href    ="/transaksi/'.$s->number_kuitansi.'/information">'.$s->number_kuitansi.'</a>';
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
      return '<a href ="/kuitansi/'.$s->id.'/edit" class="btn btn-warning btn-sm">Edit</a>';
      })
      ->editColumn('delete', function($s){
      return '<a href ="/kuitansi/'.$s->number_kuitansi.'" class="btn btn-danger btn-sm delete" id ='.$s->number_kuitansi.' >Delete ini</a>';
      })
      ->rawColumns(['delete','action','nama_petugas','name_amil','nama_muzakki','alamat_penyetor','nama_penyetor','number_kuitansi','tgl_setor'])
      ->make();
   }

   public function create(Request $request)
   {       

      // $this->validate($request,[
      // //    'number_kuitansi'                    => 'required|unique:kuitansi',
      // //    'nama_penyetor'                      => 'required|min:5|max:20',
      // //    'nilai_ziswaf'                       => 'required|numeric',
      //    "nama_muzakki.*"                      => "required|nullable|distinct",
      //    ],
      //    [
      //    'required'                           => ':attribute wajib diisi cuy!!!',
      // //    'min'                                => ':attribute harus diisi minimal :min karakter ya cuy!!!',
      // //    'max'                                => ':attribute harus diisi maksimal :max karakter ya cuy!!!',
      // //    'unique'                             => 'angka ini udah ada cuy!!!',
      //    ]);
      // // masih stuck ketika pake validate

      // // return;

      // $kuitansi = \App\RekapKuitansi::where('number_kuitansi','==','number_kuitansi'.$request->number_kuitansi.'%')->get();
      
      foreach($request->nama_muzakki as $muzaki){
      $save_muzaki                          = new \App\Muzakki;
      $save_muzaki->nama_muzakki            = $muzaki;
      $save_muzaki->save();
      
      // membuat tambah id muzakki
      
      $kuitansi                             = new \App\RekapKuitansi;
      $kuitansi->number_kuitansi            = $request->number_kuitansi;
      $kuitansi->petugas_id                 = $request->petugas_id;
      $kuitansi->tgl_setor                  = date('Y-m-d');
      $kuitansi->alamat_penyetor            = "Jakarta";
      $kuitansi->amil_id                    = $request->amil_id;
      $kuitansi->nama_penyetor              = $request->nama_penyetor;
      $kuitansi->muzakki_id                 = $save_muzaki->id;
      $kuitansi->save();
      
      // membuat id kuitansi
      
      $request->request->add(['kuitansi_id' => $kuitansi->id]);
      $zakat                                = new \App\Transaksi;
      $zakat->jenis_ziswaf_id               = $request->jenis_ziswaf_id;
      $zakat->satuan_ziswaf_id              = $request->satuan_ziswaf_id;
      $zakat->nilai_ziswaf                  = $request->nilai_ziswaf;
      $zakat->save();

      // membuat id ziswaf
      };
      // return;

      // dd($request->all([]));  
      return redirect('/kuitansi')->with('sukses','Data berhasil di input');
   }

   public function delete($id)
   {  
      RekapKuitansi::where('number_kuitansi', $id)->delete();
      return redirect()->back()->with('sukses','Data berhasil di delete');
   }
}
