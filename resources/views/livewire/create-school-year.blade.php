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
                @error('libelle')
                <div class="text text-red-500 mt-1">*Le champ libelle est requis</div>
                @enderror

                <input type="text" class="block mt-1 rounded-sm border-gray-300 w-full"
                wire:model='libelle'>

            </div>
            <div class="p-5 flex justify-between items-center">
                <button class="bg-red-600 p-3 rounded-sm text-white text-sm">Annuler</button>
                <button class="bg-green-600 p-3 rounded-sm text-white text-sm" type="submit">Ajouter</button>
            </div>
    </form>
</div>
