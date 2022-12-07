<?php

namespace App\Http\Controllers;
use App\Models\curso_estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

//Controller de la tabla estudiantes y sus campos
class estudiante extends Controller
{

    public function insert(Request $request)
    {
        if (auth()->user()->rol == 1) {
            $request->validate([
                'nombre' => 'required',
                'apellidos' => 'required',
                'dni' => 'required',
                'curso' => 'required'
            ]);

            $estudiante = new curso_estudiante();
            $estudiante->nombre = $request->nombre;
            $estudiante->apellidos = $request->apellidos;
            $estudiante->dni = $request->dni;
            $estudiante->curso = $request->curso;
            $estudiante->save();

            return response()->json([
                "status" => 1,
                "msg" => "Registro de estudiante exitoso",
            ]);
        } else {
            return "No tienes permisos";
        }
    }

    public function update(Request $request)
    {
        if (auth()->user()->rol == 1 || auth()->user()->rol == 2) {
            $estudiante = new curso_estudiante();
            $estudiante->nombre = $request->nombre;
            $estudiante->apellidos = $request->apellidos;
            $estudiante->dni = $request->dni;
            $estudiante->curso = $request->curso;
            $estudiante->update();

            return response()->json([
                "status" => 1,
                "msg" => "Se a actualizado el estudiante",
            ]);
        } else {
            return "No tienes permisos";
        }
    }

    public function destroy(Request $request)
    {
        if (auth()->user()->rol == 1) {
            $estudiante = new curso_estudiante();
            $estudiante->nombre = $request->nombre;
            $estudiante->apellidos = $request->apellidos;
            $estudiante->dni = $request->dni;
            $estudiante->curso = $request->curso;
            $estudiante->delete();

            return response()->json([
                "status" => 1,
                "msg" => "Se ha quitado el estudiante",
            ]);
        } else {
            return "No tienes permisos";
        }
    }
}
