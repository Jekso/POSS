@extends('layouts/main_layout')
@section('content')

<div class="row">
	<div class="col-md-6 sys-data">
		<h1 class="text-center">PETROL OIL SMART SYSTEM</h1>
		<div class="hr-line"></div>
		<p>
			Welcome to the POSS (petrol oil smart system) , it is a system to manage
			the Rigs and the workers associated to those rigs , the system manage
			the Rigs with Workers , Reports , Admins , Supervisors .
			Enjoy using POSS ^_^
		</p>
		<a href="{{{route('login')}}}" class="btn btn-block btn-danger">Go To Login Page </a>
	</div>
</div>



@stop
