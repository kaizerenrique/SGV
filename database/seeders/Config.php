<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Ciudade;
use App\Models\Banco;
use App\Models\Comuna;
use App\Models\ConsejoComunal;
use App\Models\Clap;
use App\Models\Direccion;
use App\Models\Servicios;
use App\Models\Proveedoresdeservicios;
use Illuminate\Support\Str;
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
        //estados de venezuela
        $json1 = File::get("database/data/01_estados.json");
        $data = json_decode($json1);
        foreach ($data as $obj) {
            Estado::create(array(
                'id' => $obj->id,
                'estado' => $obj->estado,
                'iso' => $obj->iso,
            ));
        };

        //municipios de venezuela
        $json2 = File::get("database/data/02_municipios.json");
        $data = json_decode($json2);
        foreach ($data as $obj) {
            Municipio::create(array(
                'id' => $obj->id,
                'estado_id' => $obj->estado_id,
                'municipio' => $obj->municipio,
            ));
        };

        //parroquias de venezuela
        $json3 = File::get("database/data/03_parroquias.json");
        $data = json_decode($json3);
        foreach ($data as $obj) {
            Parroquia::create(array(
                'id' => $obj->id,
                'municipio_id' => $obj->municipio_id,
                'parroquia' => $obj->parroquia,
            ));
        };

        //ciudades de venezuela
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

        //bancos de venezuela
        $json5 = File::get("database/data/05_bancos.json");
        $data = json_decode($json5);
        foreach ($data as $obj) {
            Banco::create(array(
                'codigo' => $obj->codigo,
                'nombre' => $obj->nombre,
                'rif' => $obj->rif,
            ));
        };

        //comuna
        $comuna = Comuna::create([
            'nombre' => 'Amor Supremo Corazon de Acero',
            'codigoSitur' => '01-02-03-040-0506',
            'estado_id' => 6,
            'municipio_id' => 66,
            'parroquia_id' => 214,
            'direccion' => 'Unare 2 sector 2',
            'referencia'=> 'Andrés Bello',
            'slug' => 'amor-supremo-corazon-de-acero',
        ]);

        //consejo comunal
        $consejocomunal = ConsejoComunal::create([
            'name' => 'CONSEJO COMUNAL UNARE II SECTOR II LA PLACITA UD 292',
            'codigoSitur' => '07-01-06-001-0096',
            'comuna_id' => $comuna->id,
            'estado_id' => 6,
            'municipio_id' => 66,
            'parroquia_id' => 214,
            'sector' => 'UNARE 2',
            'comunidad' => 'LA PLACITA',
            'direccion' => 'Unare 2 sector 2',
            'referencia' => 'Colegio Fe Y Alegría Jesus Soto',
            'slug' => 'consejo-comunal-unare-ii-sector-ii-la-placita-ud-292',
            'elegido' => '2021-07-09',   
            'vence' => '2023-07-09' 
        ]);

        //clap
        $clap = Clap::create([
            'name' => 'PACHAMAMA',
            'codigo' => 'CLAPS_BOL_070106_00027',
            'consejo_comunal_id' => $consejocomunal->id,
        ]);        

        $json6 = File::get("database/data/06_direcciones.json");
        $data = json_decode($json6);
        foreach ($data as $obj) {
            Direccion::create(array(
                'direccion' => $obj->direccion,
                'codigo' => Str::random(10),
                'tipo' => $obj->tipo,
                'consejo_comunal_id' => $consejocomunal->id,
                'clap_id' => $clap->id,
                'latitud' => $obj->latitud,
                'longitud' => $obj->longitud
            ));
        };

        $json7 = File::get("database/data/07_servicios.json");
        $data = json_decode($json7);
        foreach ($data as $obj) {
            Servicios::create(array(
                'servicio' => $obj->servicio,
                'descrip' => $obj->descrip
            ));
        };        

        $json8 = File::get("database/data/08_proveedoresdeservicio.json");
        $data = json_decode($json8);
        foreach ($data as $obj) {
            Proveedoresdeservicios::create(array(
                'nombre' => $obj->nombre,
                'servicio_id' => $obj->servicio_id
            ));
        };
    }
}
