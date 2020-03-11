@extends('layouts.master')

@section('header')
@stop
@section('content')
<div class="main">
	<div class="main-content">
		<h1>Edit data pribadi</b></h1>	
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-body">
							<form action="/petugas/{{$petugas->id}}/update" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								<div class="form-group{{$errors->has('nama_amil') ? ' has-error' : ''}}">
								<label for="exampleInputEmail1">Nama Amil</label>
								<input name="nama_amil" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama Amil" value="{{$petugas->nama_amil}}">
								@if($errors->has('nama_amil'))
								<span class="help-block">{{$errors->first('nama_amil')}}</span>
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