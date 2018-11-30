<?php

namespace App\Http\Controllers;

use App\Models\UserDetailsModel;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDetailsModel $model)
    {
		$list = $model->listUserDetails();
		return view('LoginModule.login-view', ['userdetails' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('LoginModule.register-view');
    }
	public function login(AuthRequest $request){
		$username = $request->input('username');
		$password = $request->input('password');
		$list = UserDetailsModel::where('user_name',$username)
									->where('pass_word',$password)
									->first();
		if($list)
			return redirect()->action('LoginController@index')->with('status','You are logged in.');
		else
			return redirect()->action('LoginController@index')->with('status','Not logged in.');
	}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request, UserDetailsModel $model)
    {
		//$validated = $request->validated();
		$fullname = $request->input('fullname');
		$gender = $request->input('gender');
		$username = $request->input('username');
		$password = $request->input('password');
		$email = $request->input('email');
		$data = array(
			'username' => $username, 
		);
		$model->fullname = $fullname;
		$model->gender = $gender;
		$model->user_name = $username;
		$model->pass_word = $password;
		$model->email = $email;
		$model->save();
		return view('LoginModule.register-view',$data);	
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDetailsModel  $userDetailsModel
     * @return \Illuminate\Http\Response
     $*/
    public function show(Request $request)
    {
		$id = $request->id;
		$list = UserDetailsModel::where('id','=', $id)->get();
		return view('LoginModule.login-view', ['userdetails' => $list]);	
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDetailsModel  $userDetailsModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
		$id = $request->id;
        $list = UserDetailsModel::where('id','=', $id)->first();
        return view('LoginModule.register-view', ['userdetails' => $list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDetailsModel  $userDetailsModel
     * @return \Illuminate\Http\Response
     */
    public function update(LoginRequest $request)
    {
	//$validated = $request->validated();
		$id = $request->input('id');
        $fullname = $request->input('fullname');
        $gender = $request->input('gender');
        $username = $request->input('username');
        $password = $request->input('password');
		$email = $request->input('email');
		$model = UserDetailsModel::find($id);	
        $model->fullname = $fullname;
        $model->gender = $gender;
        $model->user_name = $username;
        $model->pass_word = $password;
		$model->email = $email;
        $model->save();
        return back();	
    }

	public function modifyStatus(Request $request)
	{
		$id = $request->id;
		$status = $request->status;
		$model = UserDetailsModel::find($id);
		$model->status = $status;
		$model->save();
		return back();			
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDetailsModel  $userDetailsModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
		$id = $request->id;
        UserDetailsModel::destroy($id);
        return back();	
    }
	
	public function forgotPassword(Request $request){
		$username = $request->username;
		$email = $request->email;
//		var_dump([$username, $email]); exit;
		$list = UserDetailsModel::where('user_name',$username)
								->where('email',$email)
								->first();
//		var_dump($list); exit;
		return view('LoginModule.password-view', ['userdetails'=> $list]);
	}
}
