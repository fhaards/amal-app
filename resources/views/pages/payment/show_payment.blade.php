@extends('pages.user.profile')

@section('profile-contents')

    <div class="flex flex-col bg-white md:mt-0 mt-5 mb-5 rounded-lg  w-full">
        <div class="flex gap-2">
            <p class="text-primary sm:text-xl font-bold">
                Metode Pembayaran
            </p>
            <div class="flex flex-1">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $message)
                        <div id="alert-2" class="flex gap-3 bg-red-100 rounded-lg p-4 mb-4 items-center text-red-700"
                            role="alert">
                            <i class="font-medium fe fe-alert-circle fe-12"></i>
                            <div class="ml-3 text-sm font-medium text-red-700">
                                {{ $message }}
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8"
                                data-collapse-toggle="alert-2" aria-label="Close">
                                <span class="sr-only">Dismiss</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="pb-5 order-2">
                <button
                    class="text-white bg-primary hover:bg-primary focus:ring-4 focus:ring-green-300 font-bold rounded-lg text-xs px-3 py-2 text-center inline-flex gap-2 items-center"
                    type="button" data-modal-toggle="add-payment-modal">
                    <i class="fe fe-plus fe-16"></i> Tambah Pembayaran
                </button>
            </div>
        </div>

        <div class="md:mt-0 mt-4 flex flex-1 flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden sm:rounded-xl">
                        <table class="min-w-full w-100 h-100 table-list" id="table-paymethod">
                            <thead class="border rounded-t-xl bg-gray-100">
                                <tr class="">
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                        Pembayaran
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                        Kategori
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                        Dibuat
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                        Diubah
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Ubah</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="w-full h-full">
                                @foreach ($payments as $paym)
                                    <!-- Product 1 -->
                                    <tr class="bg-white mt-5 border border-b w-full hover:bg-gray-50 ">
                                        <td class="w-16 text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                            {{ $paym->payment_name }}
                                        </td>
                                        <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                            {{ $paym->category }}
                                        </td>
                                        <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                            {{ date_format($paym->created_at, 'd/m/Y - H:i') }}
                                        </td>
                                        <td class="text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                            {{ date_format($paym->updated_at, 'd/m/Y - H:i') }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button type="button" data-id="{{ $paym->id }}"
                                                class="edit-paymethod text-blue-600 hover:text-blue-900"
                                                data-modal-toggle="edit-payment-modal">Ubah</button>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modals')
    @include('pages/payment/add_payment')
    @include('pages/payment/edit_payment')
@endpush

@push('js-pages')
    <script src="{{ asset('js/app-payment-methods.js') }}"></script>
@endpush
