<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Ajouter une information
        </h2>

    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <div>
                <x-input-label for="type" :value="'Choisir un type'" />
                <x-select name="type" type="password" class="mt-1 block w-full" />
                <x-input-error :messages="$errors->updatePassword->get('type')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="password" :value="'Titre'" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="remember_me" :value="'A publier ?'" />

                <input id="remember_me" type="checkbox"
                    class="mt-1 rounded border-gray-300 p-5 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
            </div>
            <div class="col-span-2 mb-6">
                <label class="block">
                    <span class="text-gray-700">Description</span>
                    <textarea id="editor" class="mt-1 block w-full rounded-md" name="description" rows="3"></textarea>
                </label>
                @error('description')
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
            <x-primary-button>Ajouter</x-primary-button>

        </div>
    </form>
</section>
