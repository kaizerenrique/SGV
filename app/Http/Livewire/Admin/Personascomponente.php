<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\OperacionesCedula;

class Personascomponente extends Component
{
    use OperacionesCedula;
    use WithFileUploads;

    public $nac , $ci;   

    public $file;

 

    public function save()
    {
        $prueba = $this->validate([
            'file' => 'file', // 1MB Max
        ]);
        
        dd($prueba);
        //$this->photo->store('photos');
    }

    public function render()
    {
        $nac = 'V';
        $ci = '20124379'; 
        $info = $this->consultarpersona($nac, $ci);

        //dd($info);

        return view('livewire.admin.personascomponente');
    }
}
