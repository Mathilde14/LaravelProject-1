<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\AnneeScolaire;
use Exception;

class CreateSchoolYear extends Component
{
    public $libelle;
   // public $currentYear;

    public function store(AnneeScolaire $AnneeScolaires ){
        $this->validate([
            'libelle'=>'string|required|unique:annee_scolaires,anne_scolaire'
        ]);
       try {

        $currentYear = Carbon::now()->format('Y');

        $check = AnneeScolaire::where('anne_courante', $currentYear)->get() ;

        $alreadyExist = $check->count();

        if($alreadyExist >= 1){
            return  redirect()->back()->with('error', 'L\'année en cours a  deja été ajouté');
        }else{
            $AnneeScolaires->anne_scolaire = $this->libelle;
            $AnneeScolaires->anne_courante = $currentYear;

            $AnneeScolaires->save();

            if($AnneeScolaires){
                $this->libelle='';
            }
            return redirect()->back()->with('success','Année scolaire ajoutée');


        }

        } catch (Exception $e) {

    }
    }
    public function render()
    {
        return view('livewire.create-school-year');
    }
}
