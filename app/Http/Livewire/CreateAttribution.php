<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Niveaux;
use App\Models\Student;
use App\Models\Attribution;
use Exception;

class CreateAttribution extends Component
{
    public $niveau_id;
    public $student_id;
    public $matricule;
    public $classe_id;
    public $nom;
    public $prenom;

    public function store(Attribution $attribut ){
        $activeAnnee = AnneeScolaire::where('active', '1')->first();

        $query = Attribution::where('id', $this->student_id)->where('id', $activeAnnee->id )->get();
        dd($query->count());
        $this->validate([
            'matricule'=>'string|required',
            'classe_id'=>'string|required|',
            'niveau_id'=>'integer|required'


        ]);
       try {

            $attribut->student_id = $this->student_id;
            $attribut->classe_id = $this->classe_id ;
            $attribut->annee_id = $this->$activeAnnee->id;



            $attribut->save();

                return redirect()->route('inscriptions')->with('success','Elève inscrit');

        } catch (Exception $e) {

        }
    }

    public function render()
    {
        $activeAnnee = AnneeScolaire::where('active', '1')->first();


        $NiveauxCourant = Niveaux::where('id', $activeAnnee->id )->get();

        if(isset($this->matricule)){
            $currentStudent = Student::where('matricule',$this->matricule)->first();

            if($currentStudent){
            //Le nom de l'élève
            $this->nom = $currentStudent->nom;
            $this->prenom = $currentStudent->prenom;

            //Sauvegarder l'id de l'élève
            $this-> student_id = $currentStudent->id;

            }else{
            $this->nom ='';
            $this->prenom = '';

            }
        }


        if(isset($this->niveau_id)){

          $classList = Classe::where('niveau_id', $this->niveau_id)->get();
          //dd($classList);
        }else{
            $classList = [];
        }


        return view('livewire.create-attribution', compact('NiveauxCourant','classList'));
    }
}
