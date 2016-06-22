@extends('layouts/main_layout')
@section('content')


<div class="row">

	<div class="col-md-5">
		@if(Session::has('msg'))
			<p style='color:red;'>{{{ Session::get('msg') }}}</p>
		@endif
		<h1 style="margin-left:10px;">My Rigs</h1>
		<ul>
			@foreach($user_rigs as $rig)
				<li><a style="color:#e74c3c;" href="{{{route('user.rig',$rig->name)}}}">{{{ $rig->name }}}</a></li>
			@endforeach
		</ul>
	</div>
</div>

@stop
