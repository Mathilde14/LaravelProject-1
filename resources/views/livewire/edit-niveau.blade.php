<div class="p-2 bg-white shadow-sm">
    {{-- In work, do what you enjoy. --}}
    <form method="POST" wire:submit.prevent='update'>
            @csrf
            @method('post')

            @if (Session::get('error'))
                <div class="p-5">
                    <div class="text text-red-500 mt-1">{{Session::get('error')}}</div>
                </div>
            @endif

            <div class="p-5">


                <div class="block mb-5">
                    @error('code')
                    <div class="text text-red-500 mt-1">{{$message}}</div>
                    @enderror

                    <input type="text" class="block mt-1 rounded-sm border-gray-300 w-full"
                    wire:model='code' name="code" placeholder="Le code du niveau">
                </div>
                <div class="block mb-5">
                    @error('libelle')
                    <div class="text text-red-500 mt-1">{{$message}}</div>
                    @enderror

                    <input type="text" class="block mt-1 rounded-sm border-gray-300 w-full"
                wire:model='libelle' name="libelle" placeholder="Le libellé du niveau">
                </div>
                <div class="block mb-5">
                    @error('scolarite')
                    <div class="text text-red-500 mt-1">*Le Montant de la Scolarité est requis</div>
                    @enderror
                    <input type="text" class="block mt-1 rounded-sm border-gray-300 w-full"
                wire:model='scolarite' placeholder="Le Montant de la Scolarité">
                </div>
            </div>
            <div class="p-5 flex justify-between items-center">
                <button class="bg-red-600 p-3 rounded-sm text-white text-sm">Annuler</button>
                <button class="bg-green-600 p-3 rounded-sm text-white text-sm" type="submit">Mettre à Jour</button>
            </div>
    </form>
</div>
