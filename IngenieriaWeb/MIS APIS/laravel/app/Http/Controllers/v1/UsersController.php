<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\v1\User; 

class UsersController  extends Controller
{
	function save(Request $request)
	{
		$response = new \ stdClass(); 
		$response->success = true;
		
		$user = new User();
		$user->name=$request->name;
		$user->email=$request->email;
		$user->password=$request->password;
		$user->save();

		$response->data = $user; 

		return response()->json($response,200);
	}
}