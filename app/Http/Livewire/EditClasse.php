<?php

namespace App\Http\Livewire;

use App\Models\Niveaux;
use App\Models\AnneeScolaire;
use Livewire\Component;

class EditClasse extends Component
{
    public $classe;
    public $libelle;
    public $niveau_id;
    
    public function mount(){

        $this->libelle = $this->classe->libelle;
        $this->niveau_id = $this->classe->niveau_id;


     }

    public function render()
    {
        $activeAnnee = AnneeScolaire::where('active', '1')->first();

        $NiveauxCourant = Niveaux::where('id', $activeAnnee->id )->get();

        return view('livewire.edit-classe', compact('NiveauxCourant'));
    }
}
