
@extends('layouts/main_layout')
@section('content')
<a href="{{{route('admin.dashboard')}}}">&lt; Back</a>
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
		<p><b>petrol_volume : </b>{{{ $rig_report->petrol_volume }}}</p>
		<p><b>temperature : </b>{{{ $rig_report->temperature }}}</p>
		<p><b>presure : </b>{{{ $rig_report->presure }}}</p>
	</div>
</div>



@stop
