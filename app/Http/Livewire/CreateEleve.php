<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Exception;

class CreateEleve extends Component
{
    public $matricule;
    public $nom;
    public $prenom;
    public $naissance;
    public $contact_parent;



    public function store(Student $student ){
        $this->validate([
            'matricule'=>'string|required|unique:students,matricule',
            'nom'=>'string|required|',
            'prenom'=>'string|required',
            'contact_parent'=>'string|required',
            'naissance'=>'date|required'


        ]);
       try {


            $student->matricule = $this->matricule;
            $student->nom = $this->nom ;
            $student->prenom = $this->prenom;
            $student->naissance = $this->naissance;
            $student->contact_parent = $this->contact_parent;

            $student->save();

                return redirect()->route('students')->with('success','Elève ajouté');

        } catch (Exception $e) {
    }
}

    public function render()
    {
        return view('livewire.create-eleve');
    }
}
