<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Ciudade;
use App\Models\Banco;
use File;

class Config extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json1 = File::get("database/data/01_estados.json");
        $data = json_decode($json1);
        foreach ($data as $obj) {
            Estado::create(array(
                'id' => $obj->id,
                'estado' => $obj->estado,
                'iso' => $obj->iso,
            ));
        };

        $json2 = File::get("database/data/02_municipios.json");
        $data = json_decode($json2);
        foreach ($data as $obj) {
            Municipio::create(array(
                'id' => $obj->id,
                'estado_id' => $obj->estado_id,
                'municipio' => $obj->municipio,
            ));
        };

        $json3 = File::get("database/data/03_parroquias.json");
        $data = json_decode($json3);
        foreach ($data as $obj) {
            Parroquia::create(array(
                'id' => $obj->id,
                'municipio_id' => $obj->municipio_id,
                'parroquia' => $obj->parroquia,
            ));
        };

        $json4 = File::get("database/data/04_ciudades.json");
        $data = json_decode($json4);
        foreach ($data as $obj) {
            Ciudade::create(array(
                'id' => $obj->id,
                'estado_id' => $obj->estado_id,
                'ciudad' => $obj->ciudad,
                'capital' => $obj->capital,
            ));
        };

        $json5 = File::get("database/data/05_bancos.json");
        $data = json_decode($json5);
        foreach ($data as $obj) {
            Banco::create(array(
                'codigo' => $obj->codigo,
                'nombre' => $obj->nombre,
                'rif' => $obj->rif,
            ));
        };

        //configuracion de roles y permisos
        //Roles del Sistema
        $admin = Role::create(['name' => 'Administrador']); //Administrador del Sistema 
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
