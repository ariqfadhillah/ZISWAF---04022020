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
							<form action="/jenis_ziswaf/{{$jenis_ziswaf->id}}/update" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								<div class="form-group{{$errors->has('jenis_ziswaf') ? ' has-error' : ''}}">
								<label for="exampleInputEmail1">Jenis Zakat</label>
								<input name="jenis_ziswaf" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Jenis Zakatnya" value="{{$jenis_ziswaf->jenis_ziswaf}}">
								@if($errors->has('jenis_ziswaf'))
								<span class="help-block">{{$errors->first('jenis_ziswaf')}}</span>
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