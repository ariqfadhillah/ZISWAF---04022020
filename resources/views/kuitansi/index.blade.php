@extends('layouts.master')

@section('header')
@stop

@section('content')

<div class="main">
	<div class="main-content ">
		<!-- @if(session('sukses'))
		<div class="alert alert-success" role="alert">
			{{session('sukses')}}
		</div>
		@endif -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Rekap Kuitansi ZISWAF</h3>
							<div class="right">
								<!-- Button trigger modal -->
								<button type="button" class="btn"><i class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal"></i></button>
							</div>
							
						</div>
						<div class="panel-body">
							<table class="table table-hover" id="tables">
								<thead>
									<tr>
										<th class="col-md-8">Tgl Setor</th>
										<th class="col-md-8">Number Kuitansi</th>
										<th class="col-md-8">Nama Penyetor</th>
										<th class="col-md-8">Alamat Penyetor</th>
										<th class="col-md-8">Nama Muzakki</th>
										<th class="col-md-8">Nama Amil</th>
										<th class="col-md-8">Nama Petugas</th>
										<th class="col-md-8">Zakat</th>
										<th class="col-md-8">Nilai Zakat</th>
										<th class="col-md-8">Satuan Zakat</th>
										<th>Aksi</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


		<div class="row">
			<div class="col-6">
				<h1></h1>
			</div>
			<div class="col-6">
				<!-- Button trigger modal -->

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Tambah Ziswaf</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="/satuan/create" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="form-group{{$errors->has('tgl_setor') ? ' has-error' : ''}}">
										<label for="exampleInputEmail1">Tanggal Setor</label>
										<input name="tgl_setor" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pilih Waktu Sekarang" value="{{old('tgl_setor')}}">
										@if($errors->has('tgl_setor'))
										<span class="help-block">{{$errors->first('tgl_setor')}}</span>
										@endif
									</div>
									<div class="form-group{{$errors->has('number_kuitansi') ? ' has-error' : ''}}">
										<label for="exampleInputEmail1">Number Kuitansi</label>
										<input name="number_kuitansi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nomer Kuitansi" value="{{old('number_kuitansi')}}">
										@if($errors->has('number_kuitansi'))
										<span class="help-block">{{$errors->first('number_kuitansi')}}</span>
										@endif
									</div>
									<div class="form-group{{$errors->has('nama_penyetor') ? ' has-error' : ''}}">
										<label for="exampleInputEmail1">Terima Dari</label>
										<input name="nama_penyetor" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Lengkap" value="{{old('nama_penyetor')}}">
										@if($errors->has('nama_penyetor'))
										<span class="help-block">{{$errors->first('nama_penyetor')}}</span>
										@endif
									</div>
									<div class="form-group{{$errors->has('tgl_setor') ? ' has-error' : ''}}">
										<label for="exampleInputEmail1">Tgl Setor</label>
										<input name="tgl_setor" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan" value="{{old('tgl_setor')}}">
										@if($errors->has('tgl_setor'))
										<span class="help-block">{{$errors->first('tgl_setor')}}</span>
										@endif
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary btn-sm">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>

@stop

@section('footer')

<script>
	$(document).ready( function () {
    $('#tables').DataTable({
    	processing: true,
            responsive: true,
            serverSide: true,
            ajax: "{{route('ajax.5')}}",
            columns: [
            // or just disable search since it's not really searchable. just add searchable:false
            {data: 'tgl_setor', name: 'tgl_setor'},
            {data: 'number_kuitansi', name: 'number_kuitansi'},
            {data: 'nama_penyetor', name: 'nama_penyetor'},
            {data: 'alamat_penyetor', name: 'alamat_penyetor'},
            {data: 'nama_muzakki', name: 'nama_muzakki'},
            {data: 'nama_amil', name: 'nama_amil'},
            {data: 'nama_petugas', name: 'nama_petugas'},
            {data: 'jenis_ziswaf', name: 'jenis_ziswaf'},
            {data: 'nilai_ziswaf', name: 'nilai_ziswaf'},
            {data: 'satuan_ziswaf', name: 'satuan_ziswaf'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'delete', name: 'delete', orderable: false, searchable: false}

        ]
	});
} );
</script>
@stop