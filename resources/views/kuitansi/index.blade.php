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
						<h5 class="modal-title">Tambah Kuitansi</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="/kuitansi/create" method="post" enctype="multipart/form-data">
							{{csrf_field()}}

							<div class="form-group {{$errors->has('number_kuitansi') ? ' has-error' : ''}} col-md-6">
								<label for="exampleInputEmail1">Nomer Kuitansi</label>
								<input class="form-control" name="number_kuitansi" type="number" min="10000" max="" step="1" placeholder="Masukan Number Kuitansi"/>
								@if($errors->has('number_kuitansi'))
								<span class="help-block">{{$errors->first('number_kuitansi')}}</span>
								@endif
							</div>

							<div class="form-group{{$errors->has('nama_petugas') ? ' has-error' : ''}} col-md-6">
								<label for="exampleInputEmail1">Petugas Rekap</label>
								<select name="nama_petugas" class="form-control">
									@foreach($petugas as $id => $value)
									<option value="{{ $value->nama_petugas }}">
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
								<select name="nama_amil" class="form-control">
									@foreach($amil as $id => $value)
									<option value="{{ $value->nama_amil }}">
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
								<select name="jenis_ziswaf" class="form-control">
									@foreach($zakat as $id => $value)
									<option value="{{ $value->jenis_ziswaf }}">
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
								<select class="form-control">
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
								<h5>Rincian ZISWAF</h5><hr>
								<label for="exampleInputEmail1">Nilai Ziswaf</label>
								<input class="form-control" name="nilai_ziswaf" type="number" min="1" max="" step="1" placeholder="Masukan Nilai ZISWAF"/>
								@if($errors->has('nilai_ziswaf'))

								<span class="help-block">{{$errors->first('nilai_ziswaf')}}</span>
								@endif
							</div>

							<div class="form-group{{$errors->has('nama_penyetor') ? ' has-error' : ''}}">
								<h5>Rincian Muzakki</h5><hr>
								<label for="exampleInputEmail1">Nama Penyetor</label>
								<input name="nama_penyetor" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Penyetor" value="{{old('nama_penyetor')}}">
								@if($errors->has('nama_penyetor'))
								<span class="help-block">{{$errors->first('nama_penyetor')}}</span>
								@endif
							</div>

							<div id="muzakki" class="form-group{{$errors->has('nama_muzakki') ? ' has-error' : ''}}">
								<label for="exampleInputEmail1">Atas Nama (Daftar Nama Muzakki)</label>
								<input name="nama_muzakki[]" type="text" class="form-control" id="nama_0" aria-describedby="emailHelp" placeholder="Masukan Nama Muzakki" value="{{old('nama_muzakki')}}"> 
								<small id="tombol_tambah" class="text-muted"><a href="">klik tambah disini</a></small><br><br>
								@if($errors->has('nama_muzakki'))
								<span class="help-block">{{$errors->first('nama_muzakki')}}</span>
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
<script>
	$(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $("#muzakki"); //Fields wrapper
	var add_button      = $("#tombol_tambah"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			//text box increment
			$(wrapper).append('<div><input name="nama_muzakki[]" type="text" class="form-control" id="nama_'+ x++ +'" aria-describedby="emailHelp" placeholder="Masukan Nama Muzakki" value="{{old('nama_muzakki')}}"><a href="#" class="remove_field">Remove</a></div>'); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});
</script>
@stop
