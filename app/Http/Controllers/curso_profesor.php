<?php

namespace App\Http\Controllers;
use App\Models\curso_profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class profesor extends Controller
{
    public function insert(Request $request)
    {
        DB::beginTransaction();
        if (auth()->user()->rol == 4) {
            $request->validate([
                'nombre' => 'required',
                'apellido' => 'required',
                'dni' => 'required'
            ]);

            $profesor = new curso_profesor();
            $profesor->nombre = $request->nombre;
            $profesor->apellido = $request->apellido;
            $profesor->dni = $request->dni;
            //$profesor->save();
            DB::commit();
            return response()->json([
                "status" => 1,
                "msg" => "Registro de estudiante exitoso",
            ]);
        } else {
            DB::rollBack();
            return "No tienes permisos";
        }
    }

    public function update_profesor(Request $request)
    {
        DB::beginTransaction();
        if (auth()->user()->rol == 4) {
            $profesor = new curso_profesor();
            $profesor->nombre = $request->nombre;
            $profesor->apellidos = $request->apellidos;
            $profesor->dni = $request->dni;
            $profesor->curso = $request->curso;
            $profesor->update();
            DB::commit();
            return response()->json([
                "status" => 1,
                "msg" => "Se a actualizado el profesor",
            ]);
        } else {
            DB::rollBack();
            return "No tienes permisos";
        }
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        if (auth()->user()->rol == 4) {
            $profesor = new curso_profesor();
            $profesor->nombre = $request->nombre;
            $profesor->apellidos = $request->apellidos;
            $profesor->dni = $request->dni;
            $profesor->curso = $request->curso;
            $profesor->delete();
            DB::commit();
            return response()->json([
                "status" => 1,
                "msg" => "Se a quitado el profesor",
            ]);
        } else {
            DB::rollBack();
            return "No tienes permisos";
        }
    }
}
