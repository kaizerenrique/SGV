<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Familia;

class Nuevafamiliacomponente extends Component
{
    use WithPagination;
    
    public function render()
    {
        return view('livewire.admin.nuevafamiliacomponente');
    }
}
