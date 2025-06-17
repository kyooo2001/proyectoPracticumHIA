<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Termwind\Components\Raw;

class RoleController extends Controller
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
        $roles = Role::all();
        return view('roles.index', compact('roles'));
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

        //return "Listo para grabar";
        //$datos= request()->all();
        //return response()->json($datos);
        //INSERT INTO roles (name) VALUES ('Administrador');

        $role = Role::create(['name' => $request->input('nombre')]);
        return back()->with('success', 'Rol creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
        // Traer el rol 
        //$role = Role::find($id);
        //y todos los permisos disponibles
        $permisos = Permission::all();
        return view('roles.edit', compact('role', 'permisos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //asigna permisos al role y sincroniza
        $role->permissions()->sync($request->permisos);
        return redirect()->route('roles.edit', $role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        role::destroy($id);
        return redirect()->back()->with('message', 'Registro eliminado con éxito.');
    }
}
