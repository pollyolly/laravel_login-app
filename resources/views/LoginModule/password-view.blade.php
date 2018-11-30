<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Forgot Password</title>

        <!-- Styles -->
	<style>
	body, html, p, a, input{
		font-size:12pt;
	}
	.form-content {
		border:1px solid #ccc;
		padding:20px;
		display:table;
		
	 }
	.form-content .form-input {
		display:block;
		margin:10px 0px;
		padding:5px;
	}    
	
	</style>
</head>
<body>
	<div class="content">
		<div class="content-header"></div>
		@if (isset($userdetails->user_name))
			{{ $userdetails->user_name }}
		@endif
		<div class="content-body">
			<h3>Forgot Password</h3>
			<form class="form-content" action="{{ route('login.forgot-password-post') }}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="_method" value="POST" />
				<input type="text" name="username" class="form-input" placeholder="Username"/>
				<input type="text" name="email" class="form-input" placeholder="@gmail.com">
				<input type="submit" name="submit" value="Submit" class="form-input"/>
				<a href="{{ route('login.register-view') }}" class="form-links">Register</a> &nbsp;
				<a href=" {{ route('login') }} " class="form-links">Login</a>
			</form>
		</div>
		<div class="content-footer"></div>
	</div>
</body>
</html>
