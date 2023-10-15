<div class="p-2 bg-white shadow-sm">
    {{-- In work, do what you enjoy. --}}
    <form method="POST" wire:submit.prevent='store'>
            @csrf
            @method('post')

            @if (Session::get('error'))
                <div class="p-5">
                    <div class="text text-red-500 mt-1">{{Session::get('error')}}</div>
                </div>
            @endif

            <div class="p-5">
                <div class="block mb-5">
                    @error('matricule')
                    <div class="text text-red-500 mt-1">{{$message}}</div>
                    @enderror
                    <label for="">Matricule</label>
                    <input type="text" class="block mt-1 rounded-sm border-gray-300 w-full"
                wire:model='matricule' name="matricule" >
                </div>
                <div class="block mb-5">
                    @error('nom')
                    <div class="text text-red-500 mt-1">{{$message}}</div>
                    @enderror
                    <label for="">Nom</label>
                    <input type="text" class="block mt-1 rounded-sm border-gray-300 w-full"
                wire:model='nom' name="nom">
                </div>
                <div class="block mb-5">

                    <label for="">Prénom</label>
                    <input type="text" class="block mt-1 rounded-sm border-gray-300 w-full"
                wire:model='prenom' name="prenom">
                </div>

                <div class="block mb-5">
                    @error('niveau_id')
                    <div class="text text-red-500 mt-1">*Le Niveau est  requis</div>
                    @enderror
                    <label for="">Choix du  Niveau</label>
                   <select name="" id="" class="block mt-1 rounded-sm border-gray-300 w-full" wire:model='niveau_id'>
                    <option value=""></option>
                    @foreach ($NiveauxCourant as $item)
                    <option value="{{$item->id}}">{{$item->libelle}}</option>

                    @endforeach
                   </select>
                </div>
                <div class="block mb-5">
                    @error('classe_id')
                    <div class="text text-red-500 mt-1">*Le Niveau est  requis</div>
                    @enderror
                    <label for="">Selection de la classe</label>
                   <select name="" id="" class="block mt-1 rounded-sm border-gray-300 w-full" wire:model='classe_id'>
                    <option value=""></option>
                    @foreach ($classList as $item)
                    <option value="{{$item->id}}">{{$item->libelle}}</option>

                    @endforeach
                   </select>
                </div>

            </div>
            <div class="p-5 flex justify-between items-center">
                <button class="bg-red-600 p-3 rounded-sm text-white text-sm">Annuler</button>
                <button class="bg-green-600 p-3 rounded-sm text-white text-sm" type="submit">Ajouter</button>
            </div>
    </form>
</div>
