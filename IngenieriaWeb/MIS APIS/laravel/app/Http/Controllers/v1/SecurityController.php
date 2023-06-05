<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\v1\User; 

class SecurityController  extends Controller
{
	function login(Request $request)
	{
		$response = new \ stdClass(); 
		$response->success = true;
		$response->data = new \ stdClass(); 

		$user = User::where("email", $request->email)
		->where("password", $request->password)
		->first();

		
		if($user){
			$response->data->token=$user->createToken('Laravel Password Grant Client')->accessToken;
		}
		else{
			$response->success = false;
			$response->errors =[];
			$response->errors[] ="Correo y/o contraseña no válido";
		}
		return response()->json($response,($response->success?200:401));
	}
}