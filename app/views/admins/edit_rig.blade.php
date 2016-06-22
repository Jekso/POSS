@extends('layouts/main_layout')
@section('content')


<div class="row">
	<div class="col-md-7">
        <a href="{{{route('admin.dashboard')}}}">&lt; Back</a>
		<h1>Edit Rig</h1>
		@if(Session::has('msg'))
			<p style="color:#e74c3c;margin-left:15px;"><b>{{{Session::get('msg')}}}</b></p>
		@endif
		{{Form::open()}}
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Rig Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputEmail3" name="name" value="{{{$rig->name}}}">
					<span class="label label-danger">{{{$errors->first('name')}}}</span>
				</div>
			</div>
			<div class="form-group">
				<br>
				<label for="place" class="col-sm-2 control-label">Rig Place</label>
				<div class="col-sm-10">
					<input type="text" style="margin-top:10px;" class="form-control" id="inputEmail3" name="place" value="{{{$rig->place}}}">
					<span class="label label-danger">{{{$errors->first('place')}}}</span>
				</div>
			</div>
			<div class="form-group">
				<br>
				<label for="place" class="col-sm-2 control-label">Users</label>
				<div class="col-sm-10">
					<div style="height:200px;overflow:auto;border: 1px dashed black;padding:5px;margin-top:8px;">
						@foreach($all_workers as $username => $id)
                            @if(in_array($id, $rig_workers))
                                <input type='checkbox' name='workers[]' value='{{{$id}}}' checked="checked"> <b>{{{ $username }}}</b>
                            @else
                                <input type='checkbox' name='workers[]' value='{{{$id}}}'> <b>{{{ $username }}}</b>
                            @endif

							<br>
						@endforeach
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-danger" style="margin-top:10px;">Update Rig</button>
				</div>
			</div>
		{{Form::close()}}
	</div>
</div>

@stop
