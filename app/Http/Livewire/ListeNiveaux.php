<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Niveaux;
use App\Models\AnneeScolaire;
use Livewire\WithPagination;

class ListeNiveaux extends Component
{
    use WithPagination;
    public $search = '';

    public function delete(Niveaux $niveau){
        $niveau->delete();
        return  redirect()->route('niveaux')->with('success', 'Niveau supprimé');
    }

    public function render()
    {
        if(!empty($this->search)){
            $niveaux = Niveaux::where('libelle', 'like','%'.
            $this->search.'%')->orWhere('code', 'like','%'.
            $this->search.'%')-> paginate(10);
        }else{
            $activeAnnee = AnneeScolaire::where('active', '1')->first();

            $niveaux = Niveaux::where('id', $activeAnnee->id )->paginate(10);
        }
        return view('livewire.liste-niveaux', compact('niveaux'));
    }
}
