<?php

namespace App\Http\Livewire;

use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Niveaux;
use Livewire\Component;
use Exception;

class CreateClasse extends Component
{
    public $libelle;
    public $niveau_id;

    public function store(Classe $classes ){
        $this->validate([
            'libelle'=>'string|required',
            'niveau_id'=>'string|required',


        ]);
       try {


            $classes->libelle = $this->libelle;
            $classes->niveau_id = $this->niveau_id ;


            $classes->save();
                return redirect()->route('classes')->with('success','Classe ajoutée');

        } catch (Exception $e) {

        }
    }

    public function render()
    {
        $activeAnnee = AnneeScolaire::where('active', '1')->first();

        //Charger les niveaux qui appartiennent a l'année en cours

        $NiveauxCourant = Niveaux::where('id', $activeAnnee->id )->get();

        return view('livewire.create-classe', compact('NiveauxCourant'));
    }
}
