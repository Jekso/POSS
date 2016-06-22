@extends('layouts/main_layout')
@section('content')

<div class="row">
	<div class="col-md-6 sys-data">
		{{ Form::open() }}
			<div class="form-group">
				<label for="username" class="col-sm-2 control-label">Username</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputEmail3" name="username" placeholder="username">
					<span class="label label-danger">{{{$errors->first('username')}}}</span>
				</div>
			</div>
			<br>
			<br>
			<br>
			<div class="form-group">
				<label for="password" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
					<span class="label label-danger">{{{$errors->first('password')}}}</span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<div class="checkbox">
					<label>
						<input type="checkbox" name="remember_me"> Remember me
					</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-danger">Sign in</button>
				</div>
			</div>
		{{ Form::close() }}
	</div>
</div>


@stop
