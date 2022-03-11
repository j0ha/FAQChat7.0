<?php

namespace App\Http\Livewire;

use App\Frage;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Controllers\YouTubeController;

class Crud extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = false;
    public $count = 0;
    public $youActive = false;

    public function render()
    {
        if($this->count >= 3 and $this->youActive == true) {
        $you = new YouTubeController();
        $you->getComments();
        $this->count = 0;
    }
        $this->count = $this->count + 1;
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

    public function toggleYou() {
        if($this->youActive == true) {
            $this->youActive = false;
        } else {
            $this->youActive = true;
        }
    }
}
