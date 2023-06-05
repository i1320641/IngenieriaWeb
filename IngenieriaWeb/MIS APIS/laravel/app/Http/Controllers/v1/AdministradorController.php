<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\v1\Administrador; 

class AdministradorController extends Controller
{
    function getAll(Request $request)
    {
        $search=$request->search;
        $response= new \stdClass();
        $administrador= Administrador::all();
        $response->success=true;
        $response->data = $administrador;
        return response()->json($response,200);
    }

    function getItem($id)
    {
        $response= new \stdClass();
        $administrador= Administrador::find($id);
        $response->success=true;
        $response->data = $administrador;
        return response()->json($response,200);   
    }

    function store(Request $request)
    {
        $response = new \stdClass();
        $administrador = new Administrador();
        
        $administrador->nombre = $request->nombre;
        $administrador->correo = $request->correo;
        $administrador->save();
        $response->success = true; 
        $response->data = $administrador;
        return response()->json($response,200);   
    }

    function putUpdate(Request $request)
    {
        $response = new \stdClass();
        $administrador = Administrador::find($request->id);

        if($administrador)
        {
            
            $administrador->nombre = $request->nombre;
            $administrador->correo = $request->correo;
            $administrador->save();
            $response->success = true;
            $response->data = $administrador;
        }
        else{
            $response->success = false;
            $response->errors = ["el usuario con el id ".$request->id."no existe"];
        }
        return response()->json($response, ($response->success?200:401));   
    }
    
    function patchUpdate(Request $request)
    {
        $response = new \stdClass();
        $administrador = Administrador::find($request->id);

        if($administrador)
        {
            if($request->nombre)
            $administrador->nombre = $request->nombre;
            if($request->correo)
            $administrador->correo = $request->correo;
            $administrador->save();
            $response->success = true;
            $response->data = $administrador;
        }

        else{
            $response->success = false;
            $response->errors = ["el usuario con el id ".$request->id." no existe"];
        }
        return response()->json($response, ($response->success?200:401));   
    }
    
    function delete($id)
    {
        $response = new \stdClass();
        $administrador = Administrador::find($id); 
        if($administrador){
            $administrador->delete();
            $response->success = true;
        }
        else{
            $response->success = false;
            $response->errors = ["el usuario con el id ".$id." no existe"];
        }
        return response()->json($response, ($response->success?200:401));

    }
}

