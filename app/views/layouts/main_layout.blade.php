<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Oil Rigs System</title>
	<link rel="stylesheet" href="{{{asset('css/bootstrap.min.css')}}}" >
	<link rel="stylesheet" href="{{{asset('css/style.css')}}}" >
</head>
<body>


<div class="container">
    @if(Auth::check())
        <div>
        	<p class="auth-data">
                Welcome , {{{Auth::user()->username}}}</b> | <a href="{{{route('logout')}}}">Logout</a>
            </p>
        </div>
    @endif
    @yield('content')
</div>

<footer class="text-center">
    Coded With Love By SPHINKEY
</footer>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{{asset('js/bootstrap.min.js')}}}"></script>
</body>
</html>
