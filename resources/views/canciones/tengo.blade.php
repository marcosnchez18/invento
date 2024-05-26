<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">




        <div class="mt-4">
            <x-input-label for="album_id" :value="''" />
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">
                            Albumes de mi biblioteca
                        </th>

                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($albumes as $album)

                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ $album->nombre }}
                            </div>
                        </td>

                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
            <x-input-error :messages="$errors->get('album_id')" class="mt-2" />
        </div>






    </div>
</x-app-layout>
