<div class="mt-5">
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
    {{-- Titre et bouton créer--}}
       <div class="flex justify-between items-center">
        <input type="text" class="block mt-1 rounded-md border-gray-300 " placeholder="Rechercher" wire:model='search'>
            <a href="{{route("settings.create-school-year")}}" class="bg-blue-300 rounded p-2 text-sm">Nouvelle Année Scolaire</a>
       </div>
       <div class="flex flex-col">
        {{-- Message  qui apparaitra apres operation--}}

        @if (Session::get('success'))
                <div class="p-5">
                    <div class="block p-2 bg-green-500  rounded-sm shadow-sm mt-2">{{Session::get('success')}}</div>
                </div>
        @endif
        {{-- styliser  le tableau--}}
        <div class="overflow-x-auto sm:mx-6 lg:mx-8">
            <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                <table class="min-w-full text-center">
                <thead class="border-b bg-gray-50">
                    <tr>
                        <th class="text-sm font-medium text-gray-900 px-6 py-6">Id</th>
                        <th class="text-sm font-medium text-gray-900 px-6 py-6">Année Scolaire</th>
                        <th class="text-sm font-medium text-gray-900 px-6 py-6">Statut</th>
                        <th class="text-sm font-medium text-gray-900 px-6 py-6">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($schoolYearList as $item)
                    <tr class="border-b-2 border-gray-100">
                        <td class="text-sm font-medium text-gray-900 px-6 py-6">{{$item->id}}</td>
                        <td class="text-sm font-medium text-gray-900 px-6 py-6">{{$item->anne_scolaire}}</td>
                        <td class="text-sm font-medium text-gray-900 px-6 py-6">
                            @if ($item->active>= 1)
                                <span class="p-1 bg-green-400 text-white rounded-sm">Actif</span>
                            @else
                                <span class="p-1 bg-red-400 text-white rounded-sm">Inactif</span>
                            @endif
                        </td>
                        <td class="text-sm font-medium text-gray-900 px-6 py-6">

                            <button class="p-2 text-white {{$item->active == 1 ? 'bg-red-400' : 'bg-green-400' }}  text-sm rounded-sm" wire:click='changerStatut({{ $item->id }})'>
                                {{$item->active == 1 ? 'Rendre Inactif':'Rendre Actif'}}
                            </button>
                        </td>

                    </tr>
                    @empty
                        <td colspan="4">Aucun élément trouvé</td>
                    @endforelse



                </tbody>
                </table>
                {{--Pagination--}}
                <div>{{$schoolYearList->links()}}</div>
                </div>
            </div>
        </div>
</div>

</div>
