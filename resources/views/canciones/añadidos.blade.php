<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <form class="max-w-sm mx-auto mt-4" action="{{ route('canciones.añadidos') }}" method="POST">
            @csrf
            <select name="album_id" id="album_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($albumes as $album)
                    <option value="{{ $album->id }}">
                        {{ $album->nombre }}
                    </option>
                @endforeach
            </select>
            <div class="mx-auto mt-4">
                <button type="submit" name="tengo" value="1" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2">Lo tengo</button>
                <button type="submit" name="no_tengo" value="1" class="bg-red-500 text-white px-4 py-2 rounded-md">No lo tengo</button>
            </div>
        </form>

        <a href="{{ route('canciones.index') }}" class="flex justify-center mt-4 mb-4">
            <button class="bg-green-500 text-white px-4 py-2 rounded-md">Volver</button>
        </a>
    </div>
</x-app-layout>
