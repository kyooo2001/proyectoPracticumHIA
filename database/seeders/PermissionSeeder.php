<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Crear permisos en la base permissions
        $permissions = [
            'Edit',
            'Delete',
            'View',
            'usuarioview',
            'Full Access',
            'Read-Only',
            'No Access',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Asignar permisos a roles

        // Administrator: todo
        Role::findByName('administrator')->syncPermissions([
            'Full Access',
        ]);

        // Secretaria: View + Edit
        Role::findByName('secretaria')->syncPermissions([
            'Read-Only',
        ]);

        // Doctor: View + Edit + usuarioview
        Role::findByName('doctor')->syncPermissions([
            'No Access',
        ]);

        // Paciente: Read-Only
        Role::findByName('paciente')->syncPermissions([
            'Read-Only',
        ]);

        // Usuario: usuarioview
        Role::findByName('usuario')->syncPermissions([
            'usuarioview',
        ]);

        // Gerente: View + Full Access
        Role::findByName('gerente')->syncPermissions([
            'View',
        ]);
    }
}
