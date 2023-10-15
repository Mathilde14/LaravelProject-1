<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Classe;
use App\Models\AnneeScolaire;
use Livewire\WithPagination;

class ListClasse extends Component
{
    public function render()
    {
        if(!empty($this->search)){
            $classesList = Classe::where('libelle', 'like','%'.
            $this->search.'%')->orWhere('code', 'like','%'.
            $this->search.'%')-> paginate(10);
        }else{

            $activeAnnee = AnneeScolaire::where('active', '1')->first();
            //where('id', $activeAnnee->id )->
            $classesList = Classe::with('niveau')->whereRelation('niveau', 'id', $activeAnnee->id ) ->paginate(10);
        }
        return view('livewire.list-classe', compact('classesList'));
    }
}
