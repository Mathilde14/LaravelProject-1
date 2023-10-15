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
                    wire:model='matricule' name="matricule">
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

                    <label for="">Date de Naissance</label>
                    <input type="date" class="block mt-1 rounded-sm border-gray-300 w-full"
                wire:model='naissance' name="naissance">
                </div>
                <div class="block mb-5">
                    
                    <label for="">Contact du parent</label>
                    <input type="text" class="block mt-1 rounded-sm border-gray-300 w-full"
                wire:model='contact_parent' name="contact_parent">
                </div>
            </div>
            <div class="p-5 flex justify-between items-center">
                <button class="bg-red-600 p-3 rounded-sm text-white text-sm">Annuler</button>
                <button class="bg-green-600 p-3 rounded-sm text-white text-sm" type="submit">Ajouter</button>
            </div>
    </form>
</div>
