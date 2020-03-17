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
							<h3 class="panel-title">Master Amil ZISWAF</h3>
							<div class="right">
								<!-- Button trigger modal -->
								<button type="button" class="btn"><i class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal"></i></button>
							</div>
							
						</div>
						<div class="panel-body">
							<table class="table table-hover" id="tables">
								<thead>
									<tr>
										<th class="col-md-12">Nama Petugas Amil</th>
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
								<h5 class="modal-title" id="exampleModalLabel">Tambah Data Amil</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="/amil/create" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="form-group{{$errors->has('nama_amil') ? ' has-error' : ''}}">
										<label for="exampleInputEmail1">Nama Amil</label>
										<input name="nama_amil" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Amil" value="{{old('nama_amil')}}">
										@if($errors->has('nama_amil'))
										<span class="help-block">{{$errors->first('nama_amil')}}</span>
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
            ajax: "{{route('ajax.4')}}",
            columns: [
            // or just disable search since it's not really searchable. just add searchable:false
            {data: 'nama_amil', name: 'nama_amil'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'delete', name: 'delete', orderable: false, searchable: false}
        ]
	});
} );
</script>
@stop