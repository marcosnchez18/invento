<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST"
            action="{{ route('canciones.update', ['cancion' => $cancion]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <!-- titulo -->
            <div>
                <x-input-label for="titulo" :value="'titulo'" />
                <x-text-input id="titulo" class="block mt-1 w-full"
                    type="text" name="titulo" :value="old('titulo', $cancion->titulo)" required
                    autofocus autocomplete="titulo" />
                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
            </div>



            <!-- albumes -->
            <div class="mt-4">
                <x-input-label for="album_id" :value="'album'" />
                <select id="album_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="album_id">
                    @foreach ($albumes as $album)
                        <option value="{{ $album->id }}"
                            {{ old('album_id', $album->album_id) == $album->id ? 'selected' : '' }}
                            >
                            {{ $album->nombre }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('album_id')" class="mt-2" />
            </div>


            <!-- artistas -->
            <div class="mt-4">
                <x-input-label for="artista_id" :value="'artista del album'" />
                <select id="artista_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="artista_id">
                    @foreach ($artistas as $artista)
                        <option value="{{ $artista->id }}"
                            {{ old('artista_id', $artista->artista_id) == $artista->id ? 'selected' : '' }}
                            >
                            {{ $artista->nombre }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('artista_id')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="duracion" :value="'duracion'" />
                <x-text-input id="duracion" class="block mt-1 w-full"
                    type="text" name="duracion" :value="old('duracion', $cancion->duracion)" required
                    autofocus autocomplete="duracion" />
                <x-input-error :messages="$errors->get('duracion')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('canciones.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Editar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
