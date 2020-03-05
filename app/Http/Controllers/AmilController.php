<?php

namespace App\Http\Controllers;

use App\Amil;
use Illuminate\Http\Request;

class AmilController extends Controller
{
    public function index()
    {	
    	$amil = Amil::all();
        return view('amil.index', compact('amil'));
    }

    public function get()
    {
        $amil= Amil::select('amil.*');
        
        return \DataTables::eloquent($amil)
        ->addColumn('nama_amil', function($s){
            return $s->nama_amil;
        })
        ->addColumn('action', function($s){
            return '<a href="/amil/'.$s->id.'/edit" class="btn btn-warning btn-sm">Edit</a>';
        })
        ->editColumn('delete', function($s){
            return '<a href="/amil/'.$s->id.'/delete" class="btn btn-danger btn-sm delete" id ='.$s->id.' >Delete</a>';
        })
        ->rawColumns(['delete','action','nama_amil'])
        ->toJson();
    }
}
