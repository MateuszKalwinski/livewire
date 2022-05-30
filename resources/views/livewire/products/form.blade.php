@php
    $product = isset($product) ? $product : optional(null);
@endphp
<div>
    <div>
        <x-jet-label for="name" value="{{ __('Product name') }} *"/>
        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name') ?? $product->name ?? ''}}"
                     autofocus/>
        @include('livewire.form-error', ['key' => 'name'])

    </div>

    <div class="mt-4">
        <x-jet-label for="description" value="{{ __('Product description') }} *"/>
        <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description"
                     value="{{old('description') ?? $product->description ?? ''}}"/>
        @include('livewire.form-error', ['key' => 'description'])
    </div>

    <div class="mt-4">
        <x-jet-label for="price" value="{{ __('Product price') }} - dodaj minimum jedną cenę produktu"/>
        <x-jet-input id="price" min="0.01" step="0.01" class="block mt-1 w-full" value="0.01" type="number"/>
        <button id="addPrice" type="button"
                class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 disabled:opacity-25 transition">
            {{__('Add price')}}
        </button>

        @include('livewire.form-error', ['key' => 'prices'])

    </div>

    <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{__('Product price')}}
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">{{__('Delete')}}</span>
                </th>
            </tr>
            </thead>
            <tbody id="prices">
            @forelse($product->prices ?? [] as $key => $price)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap w-full"><input
                            class="input-price border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                            type="number" name="prices[{{$key}}]" value="{{$price->price}}" readonly=""></td>
                    <td `class="px-6 py-4">
                        <button type="button"
                                class="delete-price font-medium text-red-600 dark:text-red-500 hover:underline">Usuń
                        </button>
                    </td>
                </tr>
            @empty
                <tr id="empty"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th colspan="2"
                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap w-full">
                        Brak
                    </th>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="flex items-center justify-end mt-4">
        <a href="{{ url()->previous() }}"
           class="mr-4 inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">
            {{__('Cancel')}}
        </a>

        <x-jet-button type="submit">
            {{ __('Save') }}
        </x-jet-button>

    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function () {

                $('#addPrice').click(function () {
                    let price = $('#price').val();
                    $('#empty').remove();

                    if (price !== '') {
                        let prices = $('#prices');
                        let numberOfRows = prices.children().length


                        prices.append('<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"> ' +
                            '<td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap w-full">' +
                            '<input class="input-price border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"' +
                            'type="number" name="prices[' + numberOfRows + ']" value="' + price + '" readonly>' +
                            '</td>' +
                            '<td `class="px-6 py-4">' +
                            '<button type="button" class="delete-price font-medium text-red-600 dark:text-red-500 hover:underline">{{__('Delete')}}</button>' +
                            '</td`>' +
                            '</tr>');
                    } else {
                        alert('{{__('Enter the price of the product.')}}')
                    }
                })

                $(document).on('click', '.delete-price', function () {
                    $(this).closest('tr').remove();
                    if ($('#prices').find('tr').length === 0) {
                        $('#prices').append(
                            '<tr id="empty" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">' +
                            '<th colspan="2" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap w-full">Brak</th>' +
                            '</tr>');
                    } else {
                        let index = 0
                        $("#prices tr").each(function () {
                            $(this).find('.input-price').attr('name', 'prices[' + index + ']')
                            index++;
                        });
                    }
                })
            });

        </script>
    @endpush
</div>
