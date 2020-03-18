@extends('layouts.master')

@section('header')
@stop
@section('content')
<div class="main">
	<div class="main-content">	
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<form action="/petugas/{{$petugas->id}}/update" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								<div class="form-group{{$errors->has('nama_petugas') ? ' has-error' : ''}}">
								<label for="exampleInputEmail1">Nama Petugas Rekap</label>
								<input name="nama_petugas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Petugas Rekap" value="{{$petugas->nama_petugas}}" required>
								@if($errors->has('nama_petugas'))
								<span class="help-block">{{$errors->first('nama_petugas')}}</span>
								@endif
							</div>
							</div>
							<button type="submit" class="btn btn-warning">Update</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@stop