<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Niveaux;
use App\Models\AnneeScolaire;
use Exception;
class CreateNiveau extends Component
{
    public $code;
    public $libelle;
    public $scolarite;


    public function store(Niveaux $Niveau ){
        $this->validate([
            'code'=>'string|required|unique:niveauxes,code',
            'libelle'=>'string|required|unique:niveauxes,libelle',
            'scolarite'=>'integer|required'


        ]);
       try {

            $activeAnnee = AnneeScolaire::where('active', '1')->first();

            $Niveau->code = $this->code;
            $Niveau->libelle = $this->libelle ;
            $Niveau->scolarite = $this->scolarite;
            $Niveau->annee_id = $activeAnnee->id;

            $Niveau->save();
                return redirect()->route('niveaux')->with('success','Niveau ajouté');

        } catch (Exception $e) {

    }
}
    public function render()
    {
        return view('livewire.create-niveau');
    }
}
