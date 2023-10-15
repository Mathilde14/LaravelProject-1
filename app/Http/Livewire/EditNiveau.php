<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Niveaux;
use Exception;

class EditNiveau extends Component
{
    public $niveau;
    public $code;
    public $libelle;
    public $scolarite;

    //Etape où composante est montée
    public function mount(){
       $this->code = $this->niveau->code;
       $this->libelle = $this->niveau->libelle;
       $this->scolarite = $this->niveau->scolarite;
    }


    public function update(){
        $niveau = Niveaux::find($this->niveau->id);
        $this->validate([
            'code'=>'string|required|unique:niveauxes,code',
            'libelle'=>'string|required|unique:niveauxes,libelle',
            'scolarite'=>'integer|required'

          ]);
         try {

              $niveau->code = $this->code;
              $niveau->libelle = $this->libelle ;
              $niveau->scolarite = $this->scolarite;



              $niveau->save();
                  return redirect()->route('niveau')->with('success','Information mis a jpour');

          } catch (Exception $e) {

          }

    }
    public function render()
    {

        return view('livewire.edit-niveau');
    }
}
