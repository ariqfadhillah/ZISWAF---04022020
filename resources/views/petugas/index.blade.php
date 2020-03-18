@extends('layouts.master')

@section('header')
@stop

@section('content')

<div class="main">
	<div class="main-content ">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Master Petugas Ziswaf</h3>
							<div class="right">
								<!-- Button trigger modal -->
								<button type="button" class="btn"><i class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal"></i></button>
							</div>
							
						</div>
						<div class="panel-body">
							<table class="table table-hover" id="tables">
								<thead>
									<tr>
										<th class="col-md-12">Nama Petugas</th>
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
						<h5 class="modal-title" id="exampleModalLabel">Tambah Data Petugas</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="/petugas/create" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group{{$errors->has('nama_petugas') ? ' has-error' : ''}}">
								<label for="exampleInputEmail1">Nama Petugas Rekap</label>
								<input name="nama_petugas" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Nama Petugas Rekap" value="{{old('nama_petugas')}}" required>
								@if($errors->has('nama_petugas'))
								<span class="help-block">{{$errors->first('nama_petugas')}}</span>
								@endif
							</div>

							<div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
								<label for="exampleInputPassword1">Email</label>
								<input name="email" type="email" class="form-control"aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}" required>
								@if($errors->has('email'))
								<span class="help-block">{{$errors->first('email')}}</span>
								@endif
							</div>

							<div class="form-group{{$errors->has('password') ? ' has-error' : ''}}">
								<label for="exampleInputPassword1">Password</label>

								<input name="password" type="password" class="form-control" id="pass_log_id" placeholder="Masukan Password" value="{{old('password')}}" required>

                 				<span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password" style="margin-right: 410px;">Show/Hide</span>
								
								@if($errors->has('password'))
								<span class="help-block">{{$errors->first('password')}}</span>
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
  $("body").on('click', '.toggle-password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#pass_log_id");
    if (input.attr("type") === "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }

  });
</script>
<script>
	$(document).ready( function () {
		$('#tables').DataTable({
			processing: true,
			responsive: true,
			serverSide: true,
			ajax: "{{route('ajax.0')}}",
			columns: [
            // or just disable search since it's not really searchable. just add searchable:false
            {data: 'nama_petugas', name: 'nama_petugas', orderable: true, searchable: true },
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'delete', name: 'delete', orderable: false, searchable: false}

            ]
           });
	} );
</script>
@stop