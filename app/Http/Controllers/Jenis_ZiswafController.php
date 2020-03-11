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
        public function create(Request $request)
        {
        $jenis_ziswaf = \App\Jenis_Ziswaf::create($request->all());
        $jenis_ziswaf->save();
        return redirect('/jenis_ziswaf')->with('sukses','Data berhasil di input');
        }
        public function edit(Jenis_Ziswaf $jenis_ziswaf)
        {
        return view('jenis_zakat/edit',['jenis_ziswaf' => $jenis_ziswaf]);
        }
        public function update(Request $request,Jenis_Ziswaf $jenis_ziswaf)
        {
        // dd($request -> all());
        $jenis_ziswaf->update($request->all());
        return redirect('/jenis_ziswaf')->with('sukses','Data berhasil di update');
        }
        
        public function delete(Jenis_Ziswaf $jenis_ziswaf)
        { 
        $jenis_ziswaf->delete();
        return redirect('/jenis_ziswaf')->with('sukses','Data berhasil di delete');
        }
}
