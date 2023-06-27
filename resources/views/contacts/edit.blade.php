<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Editar...') }}
            </h2>
        </div>
    </x-slot>
    <div class="flex flex-wrap mx-auto w-full bg-green-100">
        <div class="w-full ">
            <div class="md:my-6">

                @include('contacts.form')

            </div>
        </div>
    </div>
</x-app-layout>
