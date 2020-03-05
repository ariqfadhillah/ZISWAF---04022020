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
        $muzakki= Muzakki::select('muzakki.*');
        
        return \DataTables::eloquent($muzakki)
        ->addColumn('nama_muzakki', function($s){
            return $s->nama_muzakki;
        })
        ->addColumn('action', function($s){
            return '<a href="/muzakki/'.$s->id.'/edit" class="btn btn-warning btn-sm">Edit</a>';
        })
        ->editColumn('delete', function($s){
            return '<a href="/muzakki/'.$s->id.'/delete" class="btn btn-danger btn-sm delete" id ='.$s->id.' >Delete</a>';
        })
        ->rawColumns(['delete','action','nama_petugas'])
        ->toJson();
    }
}
