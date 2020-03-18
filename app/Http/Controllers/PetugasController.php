<?php
  
namespace App\Http\Controllers;

use Hash;
use App\Petugas;
use App\RekapKuitansi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

 public function create(Request $request)
 {
  // insert ke tabel users
  $user = new \App\User;
  $user->role ='petugas';
  $user->name = $request->nama_petugas;
  $user->email = $request->email;
   $user->password = bcrypt($request->get('password')); //trus tambahkan slice (\)
   $user->remember_token = \Str::random(60); //kalo di laravel 6 kebawah pakainya underscore(_)
   $user->save();
   
   // insert ke tabel Petugas
   $request->request->add(['user_id' => $user->id]);
   $petugas = \App\Petugas::create($request->all());
   $petugas->save();
   return redirect('/petugas')->with('sukses','Data berhasil di input');
  }
  public function edit(Petugas $petugas)
  {
   return view('petugas/edit',['petugas' => $petugas]);
  }

  public function update(Request $request,Petugas $petugas)
  {
  // dd($request -> all());
   $petugas->update($request->all());
   return redirect('/petugas')->with('sukses','Data berhasil di update');
  }

  public function delete($petugas)
 { 
      $petugas = Petugas::where('id', $petugas)->get();
      foreach ($petugas as $data) {
        $user = User::find($data->user_id);

      $data->delete();
      $user->delete();
      }
  return redirect('/petugas')->with('sukses','Data berhasil di delete');
 }
 public function showChangePasswordForm()
        {
        return view('user.changepassword');
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Password yang kamu masukan tidak benar. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Password baru tidak boleh sama dengan yang lama. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|same:new-password_confirmation',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Berhasil diganti !");

    }
}