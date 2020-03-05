<?php

namespace App\Http\Controllers;

use App\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {	
    	$petugas = Petugas::all();
        return view('petugas.index', compact('petugas'));
    }

    public function get()
    {
        $petugas= Petugas::select('petugas.*');
        
        return \DataTables::eloquent($petugas)
        ->addColumn('nama_petugas', function($s){
            return $s->nama_petugas;
        })
        ->addColumn('action', function($s){
            return '<a href="/petugas/'.$s->id.'/edit" class="btn btn-warning btn-sm">Edit</a>';
        })
        ->editColumn('delete', function($s){
            return '<a href="/petugas/'.$s->id.'/delete" class="btn btn-danger btn-sm delete" id ='.$s->id.' >Delete</a>';
        })
        ->rawColumns(['delete','action','nama_petugas'])
        ->toJson();
    }
}
