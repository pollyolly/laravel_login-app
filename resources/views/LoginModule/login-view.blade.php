<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Module</title>

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
	.content-data, table {
		text-align:center;
		border:1px solid #ccc;
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
		<div class="content-body">
			@if (session('status'))
				{{ session('status') }}
			@endif
			<h3>Login</h3>
			<form class="form-content" action="{{ route('login.login-post') }}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				<!-- input type="hidden" name="_method" value="POST" / -->
				<input type="text" name="username" class="form-input" placeholder="Username"/>
				<input type="text" name="password" class="form-input" placeholder="Password"/>
				<input type="submit" name="submit" value="Submit" class="form-input"/>
				<a href="{{ route('login.register-view') }}" class="form-links">Register</a> &nbsp;
				<a href="{{ route('login.forgot-password') }}" class="form-links">Forgot Password?</a>
			</form>
		</div>
		<div class="content-footer">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endif
        </div>
		<table class="content-data">
			<tr>
				<th>Name</th>
				<th>Gender</th>
				<th>Email</th>
				<th>Username</th>
				<th>Status</th>
				<th>Creation Date</th>
				<th>Last Update</th>
			</tr>		
			@foreach ($userdetails as $list)
			<tr>
				<td>{{ $list->fullname  }}</td>
				<td>{{ $list->gender  }}</td>
				<td>{{ $list->email }}
				<td>{{ $list->user_name  }}</td>
				@if ($list->status === 'Active')
					<td><b><a href="{{ route('login.register-patch', ['id'=>$list->id,'status'=>'Inactive']) }}">{{ $list->status }}</a></b></td>
				@else
					<td><b><a href="{{ route('login.register-patch', ['id'=>$list->id,'status'=>'Active']) }}">{{ $list->status }}</a></b></td>
				@endif
				<td>{{ $list->log_creation_date  }}</td>
				<td>{{ $list->log_last_update  }}</td>
				<td> 
					<a href="{{ route('login.register-edit', $list->id ) }}">Edit</a> | 
					<a href="{{ route('login.register-get', $list->id ) }}">List</a> | 
					<a href="{{  route('login.register-delete', $list->id) }}">Delete</a></td>
			</tr>
			@endforeach
		</table>
	</div>
</body>
</html>
