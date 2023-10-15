<?php

namespace App\Http\Livewire;

use App\Models\AnneeScolaire;
use App\Models\Attribution;
use App\Models\Student;
use Livewire\WithPagination;
use Livewire\Component;

class ListAttribution extends Component
{

    use WithPagination;
    public $search = '';

    //public function delete(Student $student){
      //  $student->delete();
      //  return  redirect()->route('inscriptions')->with('success', 'Eleve supprimé');
    //}

    public function render()
    {
        if(!empty($this->search)){
            $attribut = Attribution::where('matricule', 'like','%'.
            $this->search.'%')->orWhere('nom', 'like','%'.
            $this->search.'%')-> paginate(10);
        }else{
            $activeAnnee = AnneeScolaire::where('active', '1')->first();

            $attribut = Attribution::where('id', $activeAnnee->id )->paginate(10);
        }
        return view('livewire.list-attribution', compact('attribut'));
    }
}
