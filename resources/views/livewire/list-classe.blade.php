<div class="mt-5">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
        {{-- Titre et bouton créer--}}
           <div class="flex justify-between items-center">
            <input type="text" class="block mt-1 rounded-md border-gray-300 " placeholder="Rechercher" wire:model='search'>
                <a href="{{route('classes.create')}}" class="bg-blue-300 rounded p-2 text-sm">Ajouter Une Classe</a>
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
                            <th class="text-sm font-medium text-gray-900 px-6 py-6">Libellé</th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-6">Niveau</th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-6">Montant Scolarité</th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-6">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($classesList as $item)
                        <tr class="border-b-2 border-gray-100">
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">{{$item->id}}</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">{{$item->libelle}}</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">{{$item->niveau->libelle}}</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">{{$item->niveau->scolarite}} FCFA</td>
                            <td>
                                <a href="{{route('classes.edit', $item->id) }}" class="text-sm bg-blue-500 p-2 text-white rounded-sm">Modifier</a>
                                <a href="{{route('classes.edit', $item->id) }}" class="text-sm bg-red-500 p-2 text-white rounded-sm">Supprimer</a>
                            </td>

                        </tr>
                        @empty
                            <td colspan="5">Aucun élément trouvé</td>
                        @endforelse



                    </tbody>
                    </table>
                    {{--Pagination--}}
                    <div>{{$classesList->links()}}</div>
                    </div>
                </div>
            </div>
    </div>

    </div>
