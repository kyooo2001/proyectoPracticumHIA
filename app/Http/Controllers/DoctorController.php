<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $doctores = Doctor::with('user')->get();
        return view('doctores.index',compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        return view('doctores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //
        //return "Listo para grabar";
        //$datos= request()->all();
        //return response()->json($datos);

        $request->validate([
            'nombres'=>'required|max:150',
            'apellidos'=>'required|max:150',
            'celular'=>'required|numeric',
            'licencia_medica'=>'required',
            'especialidad'=>'required',
            'email'=>'required|max:150|unique:users',
            'password'=>'required|max:150|confirmed',
        ]);
        //crear el usuario con la relacion de latabla user
        $usuario= new User();
        $usuario->name= $request->nombres;
        $usuario->email= $request->email;
        $usuario->password= Hash::make($request['password']);
        $usuario->save();

        //Crear el doctor en la tabla doctor

        $doctor = new Doctor();
        $doctor->user_id =$usuario->id;
        $doctor->nombres= $request->nombres;
        $doctor->apellidos= $request->apellidos;
        $doctor->celular= $request->celular;
        $doctor->licencia_medica= $request->licencia_medica;
        $doctor->especialidad= $request->especialidad;
        $doctor->save();

        //Asignar role
        $usuario->assignRole('doctor');

        //return to form
       return redirect()->route('doctores.index')
       ->with('mensaje','Doctor registrado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //

        $doctor= Doctor::findOrFail($id);

        return view('doctores.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $doctor= Doctor::findOrFail($id);

        return view('doctores.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $doctor= Doctor::find($id);
        $request->validate([
            'nombres'=>'required|max:150',
            'apellidos'=>'required|max:150',
            'celular'=>'required|numeric',
            'licencia_medica'=>'required',
            'especialidad'=>'required',
            'email'=>'required|max:150|unique:users,email,'.$doctor->user->id,
            'password'=>'nullable|max:150|confirmed',
        ]);
        //Actualizar los datos en la tabla doctor
        $doctor->nombres= $request->nombres;
        $doctor->apellidos= $request->apellidos;
        $doctor->celular= $request->celular;
        $doctor->licencia_medica= $request->licencia_medica;
        $doctor->especialidad= $request->especialidad;
        $doctor->save();
        //Actualizar los datos en la tabla rlacionada user con doctor
        $usuario = User::find($doctor->user->id);
        $usuario->name= $request->nombres;
        $usuario->email= $request->email;
        if ($request->filled('password')){
            $usuario->password= Hash::make($request['password']);
              
        }

        $usuario->save();
        //return to form
        return redirect()->route('doctores.index')
            ->with('mensaje','Datos del doctor actualizados correctamente')
            ->with ('success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        //Busca en el modelo
        $doctor = Doctor::findOrFail($id);
        //Eliminar al usuario asociado
        $user= $doctor->user;
        $user->delete();
        //Eliminar al doctor
        $doctor->delete();
        //return back();
        return redirect()->back()->with('message', 'Registro eliminado con éxito.');
    }
}
