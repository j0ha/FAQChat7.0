<?php

namespace App\Http\Livewire;

use App\Frage;
use Livewire\Component;
use Livewire\WithPagination;

class Crud extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = false;

    public function render()
    {
        return view('livewire.crud', [
            'fragen' => Frage::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),
        ]);
    }

    public function done($id) {
        $frage = Frage::find($id);
        $frage->beantwortet = true;
        $frage->update();
        $this->hide($id);
    }

    public function show($id) {
        $fragen = Frage::all();
        foreach ($fragen as $item) {
            $item->aktiv = false;
            $item->update();
        }
        $frage = Frage::find($id);
        $frage->aktiv = true;
        $frage->update();
    }

    public function hide($id) {
        $frage = Frage::find($id);
        $frage->aktiv = false;
        $frage->update();
    }
}
