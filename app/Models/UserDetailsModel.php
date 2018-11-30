<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetailsModel extends Model
{
	//We to define the table properties of the custom names in the table
	//We only do this since our model has a different name
	//Our migration name "CreateUserDetails" while the model name "UserDetailsModel"
	protected $table = 'user_details'; 
	protected $primaryKey = 'id';
	const CREATED_AT = 'log_creation_date';
	const UPDATED_AT = 'log_last_update';

	public function listUserDetails(){
		$list =  UserDetailsModel::all();	
		return $list;
	}
	public function findUserDetails($id){
		$list = UserDetailsModel::find($id)->all();
		return $list;
	}
	public function insertUserDetails(){
	
	}		
}
