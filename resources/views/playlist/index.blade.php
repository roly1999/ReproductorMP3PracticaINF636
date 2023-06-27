<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Músicas') }}
            </h2>
            <a href="{{ route('contacts.create') }}" class="bg-blue-300 py-2 px-4 rounded">
                {{ __('Crear Nueva Playlist') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid md:grid-cols-2 gap-2">
                        @if ($contacts->count())
                            @foreach ($contacts as $contact)
                                <div class="bg-gray-200 p-4 rounded">
                                    <div class="flex justify-center">
                                        <img class=" w-80 h-32 rounded-xl" src="{{ $contact->getUrli() }}">
                                    </div>
                                    <div>
                                        {{ $contact->title }}
                                    </div>
                                    <div>
                                        <audio controls class="w-full">
                                            <source src="{{ $contact->getUrlp() }}" type="audio/mpeg">
                                          </audio>                                          
                                    </div>
                                    <div class="my-4 flex justify-between">
                                        <a href="{{ route('contacts.edit', ['contact' => $contact]) }}"
                                            class="bg-orange-400 rounded px-4 py-2">
                                            {{ __('Editar') }}
                                        </a>
                                        
                                        <form action="{{ route('contacts.destroy', ['contact' => $contact]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-400 rounded px-4 py-2">
                                                {{ __('Borrar') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div>
                                {{ __('The contact list is empty.') }}
                            </div>
                        @endif
                    </div>
                    @if ($contacts->count())
                        <div class="mt-4">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
