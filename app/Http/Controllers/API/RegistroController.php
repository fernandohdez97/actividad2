<?php

namespace App\Http\Controllers\API;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libs\ResultResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use App\Rules\AlphaSpaces;
use App\Rules\DniEspaniol;
use App\Rules\Telephone;
use App\Rules\Iban;
use Illuminate\Validation\Rules\Password;

class RegistroController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRegistro(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:App\Models\Usuario,email',
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'samePassword' => 'same:password',
            'nombre' => 'required|min:2|max:20|alpha',
            'apellidos' => ['required','min:2','max:40',new AlphaSpaces],
            'dni' => ['required', new DniEspaniol],
            'telefono' => ['min:9','max:12',new Telephone, 'nullable'],
            'iban' => ['required', new Iban],
            'informacion' => 'min:20|max:250|nullable'

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
            $email = $request->get('email');
            $password = $request->get('password');
            $nombre = $request->get('nombre');
            $apellidos = $request->get('apellidos');
            $dni = $request->get('dni');
            $telefono = $request->get('telefono');
            $pais = $request->get('pais');
            $iban = $request->get('iban');
            $informacion = $request->get('informacion');

            $registro = new Usuario();

            $registro->email = $email;
            $registro->password = $password;
            $registro->nombre = $nombre;
            $registro->apellidos = $apellidos;
            $registro->dni = $dni;
            $registro->telefono = $telefono;
            $registro->pais = $pais;
            $registro->iban = $iban;
            $registro->informacion = $informacion;

            $registro->save();

            $resultResponse = new ResultResponse();

            $resultResponse->setStatusCode(ResultResponse::SUCCESS_CODE);
            $resultResponse->setMessage("Registro exitoso");
            $resultResponse->setData($registro);

            return response()->json($resultResponse);
        }
    }
}
