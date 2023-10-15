<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AnneeScolaire;


class Settings extends Component
{
    use WithPagination;

    public $search = '';
    public function changerStatut (AnneeScolaire $anneeScolaire){
         //Mettre toutes les lignes de la table a active = 0
         $query = AnneeScolaire::where('active', '1')->update(['active'=>'0']);

      //Mettre a jour le statut de l'enregistrement grace a son id
        $anneeScolaire->active = '1';
        $anneeScolaire->save();
        $this->render();
    }
    public function render()
    {

        if(!empty($this->search)){
            $schoolYearList = AnneeScolaire::where('anne_scolaire', 'like','%'.$this->search.'%')->orWhere('anne_courante', 'like','%'.$this->search.'%')-> paginate(10);
        }else{
            $schoolYearList = AnneeScolaire::paginate(10);
        }


        return view('livewire.settings', compact('schoolYearList'));
    }
}
