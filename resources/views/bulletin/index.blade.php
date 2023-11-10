<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css">
    @endpush
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Tableau d'affichage
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto py-8 sm:px-6 lg:px-8">
            <div class="mb-5 bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
                <x-auth-session-status class="mb-5 border border-green-500 p-3" :status="session('status')" />

                <div class="">
                    @include('bulletin.partials.create')
                </div>
            </div>

            <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-200">Liste d'affichage
                        </h1>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-200">Liste des élements ajoutés au panneau
                            d'affichage</p>
                    </div>
                    <div class="mt-4 dark:text-gray-200 sm:ml-16 sm:mt-0 sm:flex-none">
                        {{-- <button type="button"
                            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter
                        </button> --}}
                    </div>
                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle dark:text-gray-200 sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300" id="example">
                                <thead>
                                    <tr class="divide-x divide-gray-200">
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 sm:pl-0">
                                            Type</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">
                                            Titre et
                                            Contenu
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">
                                            Fichier
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">
                                            Statut
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 sm:pr-0">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white dark:bg-gray-800">
                                    @forelse ($bulletins as $bulletin)
                                        <tr class="divide-x divide-gray-200">
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 dark:text-gray-200 sm:pl-0">
                                                {{ $bulletin->category->title }}
                                            </td>
                                            <td class="whitespace-nowrap p-4 text-sm text-gray-500 dark:text-gray-200">
                                                {!! Str::limit($bulletin->content) !!} </td>
                                            <td class="whitespace-nowrap p-4 text-sm text-gray-500">

                                                <a href="{{ Storage::url($bulletin->file) }}" target="_blank"
                                                    class="transititext-primary text-primary hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600 transition duration-150 ease-in-out"
                                                    data-te-toggle="tooltip" title="Cliquez ici pour telecharger">
                                                    <span
                                                        class="{{ !empty($bulletin->file) ? ' bg-green-100  text-green-700' : ' bg-red-100  text-red-700' }} inline-flex items-center gap-x-1.5 rounded-full px-2 py-1 text-xs font-medium">
                                                        <svg class="{{ !empty($bulletin->file) ? 'fill-green-500' : 'fill-red-500' }} h-1.5 w-1.5"
                                                            viewBox="0 0 6 6" aria-hidden="true">
                                                            <circle cx="3" cy="3" r="3" />
                                                        </svg>
                                                        {{ !empty($bulletin->file) ? 'Telechargé' : 'Impossible' }}

                                                    </span></a>
                                            </td>
                                            <td class="whitespace-nowrap p-4 text-sm text-gray-500">
                                                <span
                                                    class="{{ $bulletin->status ? ' bg-green-100  text-green-700' : ' bg-red-100  text-red-700' }} inline-flex items-center gap-x-1.5 rounded-full px-2 py-1 text-xs font-medium">
                                                    <svg class="{{ $bulletin->status ? 'fill-green-500' : 'fill-red-500' }} h-1.5 w-1.5"
                                                        viewBox="0 0 6 6" aria-hidden="true">
                                                        <circle cx="3" cy="3" r="3" />
                                                    </svg>
                                                    {{ $bulletin->status ? 'Publié' : 'Non publié' }}
                                                </span>
                                            </td>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">
                                                <a href="#"
                                                    class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                        class="sr-only">, Lindsay Walton</span></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="divide-x divide-gray-200">
                                            Aucune données
                                        </tr>
                                    @endforelse

                                    <!-- More people... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>

        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.tailwindcss.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            new DataTable('#example');
        </script>
    @endpush
</x-app-layout>
