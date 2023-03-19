<?php

namespace App\Http\Controllers\API;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libs\ResultResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tryLogin(Request $request)
    {
        $request = $request;
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails())
        {
            $error = $validator->errors()->all();

            $resultResponse = new ResultResponse();

            $resultResponse->setStatusCode(ResultResponse::ERROR_CODE);
            $resultResponse->setMessage("No se han superado las siguientes validaciones");
            $resultResponse->setData($error);

            return response()->json($resultResponse);
        }

        if($validator->passes())
        {
            $resultResponse = new ResultResponse();

            try{
                $registro = new Usuario();
                $registro = Usuario::where('email', $request->get('email'))
                                    ->where('password', $request->get('password'))
                                    ->firstOrFail();

                $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
                $resultResponse->setMessage("Usuario logueado con éxito.");
                $resultResponse->setData($registro);
    
                return response()->json($resultResponse);
            }

            catch(\Exception $e){
                $resultResponse->setStatusCode(ResultResponse::ERROR_CODE);
                $resultResponse->setMessage("Credenciales incorrectas, intentar de nuevo");

                return response()->json($resultResponse);
            }


        }
    }
}
