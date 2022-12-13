<?php
namespace App\Traits;

use App\Models\Persona;
use Kaizerenrique\Cedulavenezuela\ConsultaCedula;

trait OperacionesCedula {

    public function consultarpersona($nac, $ci)
    {        
        $conCedulaCne = new ConsultaCedula();
        $info = $conCedulaCne->consultar($nac, $ci);       

        return $info;
    }

    

}