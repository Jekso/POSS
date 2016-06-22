@extends('layouts/main_layout')
@section('content')
<a href="{{{route('user.profile')}}}">&lt; Back</a>
@if(Session::has('msg'))
	<div class="alert alert-info" role="alert">{{{ Session::get('msg') }}}</div>
@endif
<div class="row">
	<div class="col-md-12">
		<h1>Rig Data</h1>
		<p><b>Rig Name : </b>{{{ $rig->name }}}</p>
		<p><b>Rig Place : </b>{{{ $rig->place }}}</p>
	</div>
	<div class="col-md-12">
		<h1>Rig Engineers</h1>
		<ul>
			@foreach($rig_workers as $worker)
				<li><b>{{{ $worker->username }}}</b></li>
			@endforeach
		</ul>
	</div>
	<div class="col-md-12">
		<h1>Rig Report Result</h1>
		{{Form::open()}}
			<div class="form-group">
				<br>
				<label for="petrol_volume" class="col-sm-2 control-label">Petrol Volume</label>
				<div class="col-sm-10">
					<input type="text" style="margin-top:10px;" class="form-control" id="inputEmail3" name="petrol_volume" value="{{{ $rig_report->petrol_volume }}}">
					<span class="label label-danger">{{{$errors->first('petrol_volume')}}}</span>
				</div>
			</div>
			<div class="form-group">
				<br>
				<label for="temperature" class="col-sm-2 control-label">Temperature</label>
				<div class="col-sm-10">
					<input type="text" style="margin-top:10px;" class="form-control" id="inputEmail3" name="temperature" value="{{{ $rig_report->temperature }}}">
					<span class="label label-danger">{{{$errors->first('temperature')}}}</span>
				</div>
			</div>
			<div class="form-group">
				<br>
				<label for="presure" class="col-sm-2 control-label">Presure</label>
				<div class="col-sm-10">
					<input type="text" style="margin-top:10px;" class="form-control" id="inputEmail3" name="presure" value="{{{ $rig_report->presure }}}">
					<span class="label label-danger">{{{$errors->first('presure')}}}</span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-danger">Update Report</button>
				</div>
			</div>
		{{Form::close()}}
	</div>
</div>



@stop
