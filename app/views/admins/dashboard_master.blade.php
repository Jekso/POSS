@extends('layouts/main_layout')
@section('content')


<div class="row">
	<div class="col-md-5">
		<h1 style="margin-left:10px;">All Rigs</h1>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Rig Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($all_rigs as $rig)
					<tr>
						<td><a style="color:#e74c3c;" href="{{{route('admin.dashboard.rig',$rig->name)}}}">{{{ $rig->name }}}</a></td>
						<td><a class="btn btn-primary" href="{{{route('admin.dashboard.edit.rig',$rig->name)}}}">Edit</a></td>
						<td>
							{{Form::open(['route'=>['admin.dashboard.delete.rig',$rig->id]])}}
								<input type="submit" class="btn btn-danger" value="Delete">
							{{Form::close()}}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="col-md-7">
		<h1>Create New Rig</h1>
		@if(Session::has('msg'))
			<p style="color:#e74c3c;margin-left:15px;"><b>{{{Session::get('msg')}}}</b></p>
		@endif
		{{Form::open()}}
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Rig Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputEmail3" name="name" placeholder="rig name">
					<span class="label label-danger">{{{$errors->first('name')}}}</span>
				</div>
			</div>
			<div class="form-group">
				<br>
				<label for="place" class="col-sm-2 control-label">Rig Place</label>
				<div class="col-sm-10">
					<input type="text" style="margin-top:10px;" class="form-control" id="inputEmail3" name="place" placeholder="rig place">
					<span class="label label-danger">{{{$errors->first('place')}}}</span>
				</div>
			</div>
			<div class="form-group">
				<br>
				<label for="place" class="col-sm-2 control-label">Users</label>
				<div class="col-sm-10">
					<div style="height:200px;overflow:auto;border: 1px dashed black;padding:5px;margin-top:8px;">
						@foreach($all_workers as $username => $id)
							<input type='checkbox' name='workers[]' value='{{{$id}}}'> <b>{{{ $username }}}</b>
							<br>
						@endforeach
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-danger" style="margin-top:10px;">Create New Rig</button>
				</div>
			</div>
		{{Form::close()}}
	</div>
</div>

@stop
