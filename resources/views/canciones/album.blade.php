<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">
                        Titulo
                    </th>

                    <th class="px-6 py-3">
                        Canciones que contiene
                    </th>

                    <th class="px-6 py-3">
                        Duracion
                    </th>
                    <th class="px-6 py-3">
                        Donde suena
                    </th>
                    <th class="px-6 py-3">
                        Nombre
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $album->nombre }}
                    </td>

                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {!! $album->nombres_canciones() !!}
                    </td>

                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {!! $album->duracion() !!}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {!! $album->radio_o_lista() !!}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {!! $album->nombre_radio_o_lista() !!}
                    </td>



                </tr>
            </tbody>
        </table>
        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('canciones.index') }}">
                <x-secondary-button class="ms-4">
                    Volver
                    </x-primary-button>
            </a>
        </div>
    </div>
</x-app-layout>
