<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class Rolespermisosadmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //configuracion de roles y permisos
        //Roles del Sistema
        $admin = Role::create(['name' => 'Administrador']); //Administrador del Sistema 
        $somos = Role::create(['name' => 'Somos Venezuela']);
        $vcomunal = Role::create(['name' => 'Vocero Consejo Comunal']);
        $lcomunidad = Role::create(['name' => 'Lider de Comunidad']);
        $lcalle = Role::create(['name' => 'Lider de Calle']);
        $user = Role::create(['name' => 'Usuario']); //Usuario Final

        //permisos
        Permission::create(['name' => 'menuAdmin'])->syncRoles([$admin]);

        //usuario
        User::create([
            'name' => 'Oliver Gomez',
            'email' => 'kayserenrique@gmail.com',
            'password' => bcrypt('123456789'),
            'email_verified_at' => '2022-02-26 20:48:29'
        ])->assignRole('Administrador');

    }
}
