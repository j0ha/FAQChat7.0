<?php

namespace App\Http\Livewire;

use App\Frage;
use Livewire\Component;

class Bauchbinde extends Component
{
    public function render()
    {
        return view('livewire.bauchbinde', [
            'frage' => Frage::where('aktiv', true)->first(),
        ]);
    }
}
