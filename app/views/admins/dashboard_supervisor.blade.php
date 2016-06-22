@extends('layouts/main_layout')
@section('content')


<div class="row">
	<div class="col-md-5">
		<h1 style="margin-left:10px;">All Rigs</h1>
		<ul>
			@foreach($all_rigs as $rig)
				<li><a style="color:#e74c3c;" href="{{{route('admin.dashboard.rig',$rig->name)}}}">{{{ $rig->name }}}</a></li>
			@endforeach
		</ul>
	</div>
</div>

@stop
