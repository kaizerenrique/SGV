<?php
namespace App\Traits;

use App\Models\Persona;
use Kaizerenrique\Cedulavenezuela\ConsultaCedula;

trait OperacionesCedula {

    // consultar datos de cedula en el cne y en base de datos
    public function consultarpersona($nac, $ci, $fecha_nacimiento)
    {
        if (Persona::where('cedula', $ci)->exists()) {
            $info = 1;
        } else {

            $conCedulaCne = new ConsultaCedula();
            $info1 = $conCedulaCne->consultar($nac, $ci);

            if ($info1 == false) {
                $info = false;
            } else {
                if (!empty($fecha_nacimiento)) {                
                    $fechaEntera = strtotime($fecha_nacimiento);
                    $y = date("Y", $fechaEntera);
                    $m = date("m", $fechaEntera);
                    $d = date("d", $fechaEntera);
                    
                    $info2 = $conCedulaCne->ivssPension($nac, $ci, $d, $m, $y);
                    $info3 = $conCedulaCne->cuentaIndividual($nac, $ci, $d, $m, $y);   
        
                    $info = [
                        'persona' => [
                            'nacionalidad' => $info1['nacionalidad'],
                            'cedula' =>  $info1['cedula'],
                            'nombres' =>  $info1['nombres'],
                            'apellidos' =>  $info1['apellidos'],
                        ],
                        'cne' => [
                            'inscrito' => $info1['inscrito'],
                            'cvestado' =>  $info1['cvestado'],
                            'cvmunicipio' =>  $info1['cvmunicipio'],
                            'cvparroquia' =>  $info1['cvparroquia'],
                            'centro' =>  $info1['centro'],
                            'direccion' =>  $info1['direccion'],
                        ],
                        'pension' => $info2['pensionado'],
                        'ivss' => $info3['registrado']
                    ];
    
                } else {
                    $info = $info1;
                }
            }
            
        }    

        return $info;
    }       

}