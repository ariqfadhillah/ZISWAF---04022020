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
										<th>Aksi</th>
										<th></th>
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
							<div class="form-group{{$errors->has('number_kuitansi') ? ' has-error' : ''}}">
										<label for="exampleInputEmail1">Nomer Kuitansi</label>
									  <input class="form-control" name="number_kuitansi" type="number" min="10000" max="" step="1" placeholder="Masukan Number Kuitansi"/>
										@if($errors->has('number_kuitansi'))
										<span class="help-block">{{$errors->first('number_kuitansi')}}</span>
										@endif
							</div>

							<div class="form-group{{$errors->has('nama_petugas') ? ' has-error' : ''}} col-md-6">
								<label for="exampleInputEmail1">Petugas Rekap</label>
								<select id="inputState" class="form-control">
									@foreach($petugas as $id => $value)
									<option value="{{ $value->id }}">
										{{ $value->nama_petugas }}
									</option>
									@endforeach
								</select>
								@if($errors->has('nama_petugas'))
								<span class="help-block">{{$errors->first('nama_petugas')}}</span>
								@endif
							</div>

							<div class="form-group{{$errors->has('nama_amil') ? ' has-error' : ''}} col-md-6">
								<label for="exampleInputEmail1">Petugas Amil</label>
								<select id="inputState" class="form-control">
									@foreach($amil as $id => $value)
									<option value="{{ $value->id }}">
										{{ $value->nama_amil }}
									</option>
									@endforeach
								</select>
								@if($errors->has('nama_amil'))
								<span class="help-block">{{$errors->first('nama_amil')}}</span>
								@endif
							</div>

							<div class="form-group{{$errors->has('jenis_ziswaf') ? ' has-error' : ''}} col-md-6">
								<label for="exampleInputEmail1">Pilih Zakat</label>
								<select id="inputState" class="form-control">
									@foreach($zakat as $id => $value)
									<option value="{{ $value->id }}">
										{{ $value->jenis_ziswaf }}
									</option>
									@endforeach
								</select>
								@if($errors->has('jenis_ziswaf'))
								<span class="help-block">{{$errors->first('jenis_ziswaf')}}</span>
								@endif
							</div>

							<div class="form-group{{$errors->has('satuan_ziswaf') ? ' has-error' : ''}} col-md-6">
								<label for="exampleInputEmail1">Pilih Satuan</label>
								<select id="inputState" class="form-control">
									@foreach($satuan as $id => $value)
									<option value="{{ $value->id }}">
										{{ $value->satuan_ziswaf }}
									</option>
									@endforeach
								</select>
								@if($errors->has('satuan_ziswaf'))
								<span class="help-block">{{$errors->first('satuan_ziswaf')}}</span>
								@endif
							</div>

							<div class="form-group{{$errors->has('nilai_ziswaf') ? ' has-error' : ''}}">
										<label for="exampleInputEmail1">Nilai Ziswaf</label>
										<span class="date"> Pilih berdasarkan </span>
									  <input class="form-control" name="nilai_ziswaf" type="number" min="10000" max="" step="1" placeholder="Masukan Nilai ZISWAF"/>
										@if($errors->has('nilai_ziswaf'))

										<span class="help-block">{{$errors->first('nilai_ziswaf')}}</span>
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
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'delete', name: 'delete', orderable: false, searchable: false}

            ]
           });
	} );
</script>
@stop
