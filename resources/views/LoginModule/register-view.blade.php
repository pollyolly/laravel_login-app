<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register</title>

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
	@if (isset($username))
		{{ $username }}
	@endif
	<div class="content">
		<div class="content-header"></div>
		<div class="content-body">
			<h3>Register</h3>
			<form class="form-content" action=" 
				@if (isset($userdetails->id) && !empty($userdetails->id))
					{{ route('login.register-put') }}
				@else
					{{ route('login.register-post') }}
				@endif
				" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="_method" value="POST"/>
				@if (isset($userdetails->id) && !empty($userdetails->id))
					<input type="hidden" name="id" value="{{ $userdetails->id }}"/>
				@endif
				<input type="text" name="fullname" class="form-input" placeholder="Fullname" 
						value="@if(isset($userdetails->fullname)){{$userdetails->fullname}}@endif"/>
				<input type="text" name="gender" class="form-input" placeholder="Gender" 
						value="@if(isset($userdetails->gender)){{$userdetails->gender}}@endif"/>
				 <input type="text" name="email" class="form-input" placeholder="Email"
                        value="@if(isset($userdetails->email)){{$userdetails->email}}@endif"/>
				<input type="text" name="username" class="form-input" placeholder="Username" 
						value="@if(isset($userdetails->user_name)){{$userdetails->user_name}}@endif"/>					
				<input type="text" name="password" class="form-input" placeholder="Password" 
						value="@if(isset($userdetails->pass_word)){{$userdetails->pass_word}}@endif"/>
				<input type="submit" name="submit" value="Submit" class="form-input"/>
				<a href="{{ route('login.forgot-password') }}" class="form-links">Forgot Password?</a> &nbsp;
				<a href="{{ route('login')  }}" class="form-links">Login</a>
			</form>
		</div>
		<div class="content-footer">
			@if ($errors->any())
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			@endif
		</div>
	</div>
</body>
</html>
