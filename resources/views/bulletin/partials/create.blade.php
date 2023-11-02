<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Ajouter une information
        </h2>

    </header>

    <form method="post" action="{{ route('bulletin.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <div>
                <x-input-label for="bulletin_category" :value="'Choisir un type'" />
                <x-select :values="$categories" name="bulletin_category" class="mt-1 block w-full" required />
                <x-input-error :messages="$errors->get('bulletin_category')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="title" :value="'Titre'" />
                <x-text-input id="title" name="title" type="text" value="{{ old('title') }}"
                    class="mt-1 block w-full" autocomplete="title" required />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="remember_me" :value="'A publier ?'" />

                <input id="remember_me" type="checkbox"
                    class="mt-1 rounded border-gray-300 p-5 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="status" value="1">
            </div>
            <div class="col-span-2 mb-6">
                <label class="block">
                    <span class="text-gray-700">Contenu de l'information</span>
                    <textarea id="editor" class="mt-1 block w-full rounded-md" name="content" rows="3"></textarea>
                </label>
                @error('content')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block">
                    <span class="text-gray-700">Image (optionnel)</span>
                    <input type="file" name="file" id="">
                </label>
                @error('file')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-success-button>Sauvegarder</x-success-button>

        </div>
    </form>
</section>
