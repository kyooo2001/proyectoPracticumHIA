<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // $this->middleware('auth');
        //$this->middleware('can: Crear')->only('create');
        //$this->middleware(['role:administrator']);
        //funciono con role
        $this->middleware(['auth', 'role:administrator']);
    }
    public function index()
    {
        //
        $usuarios = User::all();
        return view('user.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //**View data sending to db
        //return "Listo para grabar";
        //$datos= request()->all();
        //return response()->json($datos);
        //**Validate data from form create 
        $request->validate([
            'name' => 'required|max:150|unique:users',
            'email' => 'required|max:150|unique:users',
            'password' => 'required|max:150|confirmed',


        ]);
        //**Insert on SQL INSERT TO User Values ()
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();
        //return to form with a message
        return redirect()->route('user.index')
            ->with('mensaje', 'Usuario registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Show user data
        //return $id;
        //*RECOVER ID SELECT * FROM User WHERE id =
        $usuario = User::findOrFail($id);
        //*SEND TO THE SHOW View
        return view('user.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //return $id;
        //*RECOVER ID SELECT * FROM User WHERE id =
        $usuario = User::findOrFail($id);
        //return $usuario;
        //*SEND TO THE EDIT View
        return view('user.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //return $id;
        //*RECOVER ID SELECT * FROM User WHERE id =
        $usuario = User::find($id);
        $request->validate([
            'name' => 'required|max:150|unique:users,name,' . $usuario->id,
            'email' => 'required|max:150|unique:users,email,' . $usuario->id,
            'password' => 'nullable|max:150|confirmed',

        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request['password']);
        }
        $usuario->save();
        //return back()->with('message','Usuario actualizado correctamente!');
        return redirect()->route('user.index')
            ->with('mensaje', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //return $id;
        //*RECOVER ID SELECT * FROM User WHERE id =
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return back();
    }
}
