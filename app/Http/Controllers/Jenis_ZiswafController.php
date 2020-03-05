<?php

namespace App\Http\Controllers;

use App\Jenis_Ziswaf;
use Illuminate\Http\Request;

class Jenis_ZiswafController extends Controller
{
    public function index()
    {	
    	$jenis_ziswaf = Jenis_Ziswaf::all();
        return view('jenis_zakat.index', compact('jenis_ziswaf'));
    }

    public function get()
    {
        $jenis_ziswaf= Jenis_Ziswaf::select('jenis_ziswaf.*');
        
        return \DataTables::eloquent($jenis_ziswaf)
        ->addColumn('nama_petugas', function($s){
            return $s->jenis_ziswaf;
        })
        ->addColumn('action', function($s){
            return '<a href="/jenis_ziswaf/'.$s->id.'/edit" class="btn btn-warning btn-sm">Edit</a>';
        })
        ->editColumn('delete', function($s){
            return '<a href="/jenis_ziswaf/'.$s->id.'/delete" class="btn btn-danger btn-sm delete" id ='.$s->id.' >Delete</a>';
        })
        ->rawColumns(['delete','action','nama_petugas'])
        ->toJson();
    }
}
