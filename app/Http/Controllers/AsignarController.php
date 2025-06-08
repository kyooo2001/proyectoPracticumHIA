<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Asignar;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class AsignarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('roles.userList', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignar $asignar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $user = User::find($id);
        //Bring all information from role model
        $roles = Role::all();
        return view('roles.userRol', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $user = User::find($id);
        //Asigna el rol al usuario
        $user->roles()->sync($request->roles);
        return redirect()->route('asignar.index')->with('success', 'Roles asignados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignar $id)
    {
        //
        Asignar::destroy($id);
        return redirect()->back()->with('message', 'Registro eliminado con éxito.');
    }
}
