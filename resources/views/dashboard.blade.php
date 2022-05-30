<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <livewire:messages />

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4">
                <div class="flex items-center justify-between ">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">{{ __('Products list') }}</h3>
                    <a href="{{route('create')}}"
                       class="inline-flex items-center justify-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 disabled:opacity-25 transition">
                        {{__('Create product')}}
                    </a>
                </div>
            </div>

            <livewire:products.datatable
                searchable="name, description"
                exportable
            />
        </div>
    </div>
</x-app-layout>
