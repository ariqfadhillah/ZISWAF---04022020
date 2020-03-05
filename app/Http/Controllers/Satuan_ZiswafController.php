<?php

namespace App\Http\Controllers;

use App\Satuan_Ziswaf;
use Illuminate\Http\Request;

class Satuan_ZiswafController extends Controller
{
    public function index()
    {	
    	$satuan_ziswaf = Satuan_Ziswaf::all();
        return view('satuan_zakat.index', compact('satuan_ziswaf'));
    }

    public function get()
    {
        $satuan_ziswaf= Satuan_Ziswaf::select('satuan_ziswaf.*');
        
        return \DataTables::eloquent($satuan_ziswaf)
        ->addColumn('satuan_ziswaf', function($s){
            return $s->satuan_ziswaf;
        })
        ->addColumn('action', function($s){
            return '<a href="/satuan_ziswaf/'.$s->id.'/edit" class="btn btn-warning btn-sm">Edit</a>';
        })
        ->editColumn('delete', function($s){
            return '<a href="/satuan_ziswaf/'.$s->id.'/delete" class="btn btn-danger btn-sm delete" id ='.$s->id.' >Delete</a>';
        })
        ->rawColumns(['delete','action','nama_petugas'])
        ->toJson();
    }
}
