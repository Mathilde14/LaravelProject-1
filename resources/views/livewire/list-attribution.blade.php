<div class="mt-5">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
        {{-- Titre et bouton créer--}}
           <div class="flex justify-between items-center">
            <input type="text" class="block mt-1 rounded-md border-gray-300 " placeholder="Rechercher" wire:model='search'>
                <a href="{{route('inscriptions.create')}}" class="bg-blue-300 rounded p-2 text-sm">Ajouter Attribution</a>
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
                            <th class="text-sm font-medium text-gray-900 px-6 py-6">Matricule</th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-6">Nom</th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-6">Prenom</th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-6">Classe</th>
                            <th class="text-sm font-medium text-gray-900 px-6 py-6">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attribut as $item)
                        <tr class="border-b-2 border-gray-100">
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">{{$item->id }}</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">{{$item->student->matricule ?? 'none'}}</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">{{$item->student->nom  ?? 'none'}}</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">{{$item->student->prenom ?? 'none' }}</td>
                            <td class="text-sm font-medium text-gray-900 px-6 py-6">{{$item->classe->libelle  ?? 'none'}}</td>
                            <td>
                                <a href="{{route('niveaux.edit-niveau', $item->id) }}" class="text-sm bg-blue-500 p-2 text-white rounded-sm">Modifier</a>
                                <a href="{{route('niveaux.edit-niveau', $item->id) }}" class="text-sm bg-red-500 p-2 text-white rounded-sm">Supprimer</a>
                            </td>

                        </tr>
                        @empty
                            <td colspan="5">Aucun élément trouvé</td>
                        @endforelse



                    </tbody>
                    </table>
                    {{--Pagination--}}
                    <div>{{$attribut->links()}}</div>
                    </div>
                </div>
            </div>
    </div>

    </div>
