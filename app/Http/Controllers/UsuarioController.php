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
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $usuarios = User::all();
        return view('user.index',compact('usuarios'));
        
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
       $request->validate([
        'name'=>'required|max:150',
        'email'=>'required|max:150|unique:users',
        'password'=>'required|max:150|confirmed',


       ]);

       $usuario= new User();
       $usuario->name= $request->name;
       $usuario->email= $request->email;
       $usuario->password= Hash::make($request['password']);
       $usuario->save();
       //return to form
       return redirect()->route('user.index')
       ->with('mensaje','Usuario registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
