<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //User::create([
        //    'name' => 'User',
        //    'email' => 'user@test.com',
        //    'password' => bcrypt('12345689')
        //]);
        // Crear el usuario Felipe
        $user = User::create([
            'name' => 'Felipe',
            'email' => 'kyooo2001@gmail.com',
            'password' => bcrypt('123456789'), // Encripta la contraseña
        ]);

         //Crear pacientes seeders
         $this->call([PacienteSeeder::class]);

        //Crear roles y permisos seeders
        //$administrator = Role::create(['name'=>'administrator']);
        //$paciente = Role::create(['name'=>'paciente']);
        //$secretaria = Role::create(['name'=>'secretaria']);
        //$doctor = Role::create(['name'=>'doctor']);
        //$gerente = Role::create(['name'=>'gerente']);
        //$usuario = Role::create(['name'=>'usuario']);

       

        // Asignar permiso a roles
        //$roleAdmin = Role::findByName('administrator');
    
    }
}
