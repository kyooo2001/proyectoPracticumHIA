<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecretariaController extends Controller
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
        // Traer inf entre tablas
        $secretaria= Secretaria::with('user')->get();

        return view('secretarias.index', compact('secretaria'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('secretarias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //**View data sending to db
       //return "Listo para grabar";
       //$datos= request()->all();
       //return response()->json($datos);

       $request->validate([
        'nombres'=>'required|max:150',
        'apellidos'=>'required|max:150',
        'ci'=>'required|max:150|unique:secretarias',
        'celular'=>'required|max:150',
        'fecha_nacimiento'=>'required',
        'ciudad'=>'required|max:150',
        'provincia'=>'required|max:150',
        'direccion'=>'required|max:255',


        'email'=>'required|max:150|unique:users',
        'password'=>'required|max:150|confirmed',
    ]);
        $usuario = new User();
        $usuario->name= $request->nombres;
        $usuario->email= $request->email;
        $usuario->password= Hash::make($request['password']);
        $usuario->save();
    //Tabla secreatrias
        $secretaria = new Secretaria();
        $secretaria->user_id =$usuario->id;
        $secretaria->nombres= $request->nombres;
        $secretaria->apellidos= $request->apellidos;
        $secretaria->ci= $request->ci;
        $secretaria->celular= $request->celular;
        $secretaria->fecha_nacimiento= $request->fecha_nacimiento;
        $secretaria->ciudad= $request->ciudad;
        $secretaria->provincia= $request->provincia;
        $secretaria->direccion= $request->direccion;
        $secretaria->save();





        //return to form
        return redirect()->route('secretarias.index')
            ->with('mensaje','Dato secretaria registrado correctamente');



        


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //comprobar view

        //echo $id;
        $secretaria= Secretaria::with('user')->findOrFail($id);

        return view('secretarias.show', compact('secretaria'));
        


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $secretaria= Secretaria::with('user')->findOrFail($id);

        return view('secretarias.edit', compact('secretaria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $secretaria= Secretaria::find($id);
     
    
        $request->validate([
            'nombres'=>'required|max:150',
            'apellidos'=>'required|max:150',
            'ci'=>'required|max:150|unique:secretarias,ci,'.$secretaria->id,
            'celular'=>'required|max:150',
            'fecha_nacimiento'=>'required',
            'ciudad'=>'required|max:150',
            'provincia'=>'required|max:150',
            'direccion'=>'required|max:255',
    
    
            'email'=>'required|max:150|unique:users,email,'.$secretaria->user->id,
            'password'=>'nullable|max:150|confirmed',
        ]);
        $secretaria->nombres= $request->nombres;
        $secretaria->apellidos= $request->apellidos;
        $secretaria->ci= $request->ci;
        $secretaria->celular= $request->celular;
        $secretaria->fecha_nacimiento= $request->fecha_nacimiento;
        $secretaria->ciudad= $request->ciudad;
        $secretaria->provincia= $request->provincia;
        $secretaria->direccion= $request->direccion;
        $secretaria->save();
        //Find usuarios 
        $usuario = User::find($secretaria->user->id);
        $usuario->name= $request->nombres;
        $usuario->email= $request->email;
        if ($request->filled('password')){
            $usuario->password= Hash::make($request['password']);
        }
        $usuario->save();
        return redirect()->route('secretarias.index')
            ->with('mensaje','Datos secretaria actualizados correctamente')
            ->with ('success');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $secretaria = Secretaria::findOrFail($id);
        //Eliminar usuario asociado a secretaria
        $user = $secretaria->user;
        $user->delete();

        //Eliminar a  secretaria
        $secretaria->delete();
        return back();
    }
}
