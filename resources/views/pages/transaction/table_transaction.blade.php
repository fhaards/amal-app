@extends('pages.user.profile')

@section('profile-contents')

    <div class="md:mt-0 mt-4 flex flex-1 flex-col">
        <h5 class=" font-semibold mb-5">
            Tabel Transaksi
        </h5>
        <div class="overflow-x-auto sm:-mx-6">
            <div class="inline-block min-w-full sm:px-6">
                <div class="overflow-hidden sm:rounded-xl shadow-sm">

                    @if ($transaction->isEmpty())
                        <div class="text-center p-5 h-48 flex items-center justify-center">
                            <span class="text-xs font-semibold text-gray-400">
                                Data pada tabel tidak ditemukan ,
                                <a class="text-blue-500" href="{{ route('beramal') }}">
                                    klik
                                </a> untuk menuju halaman beramal
                            </span>
                        </div>
                    @else
                        <table class="max-w-100 w-100 h-100 table-list border" id="table-trans">
                            <thead class="rounded-t-xl bg-gray-100">
                                <tr class="">
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                        Transaction Id
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                        Aliases
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                        Amount
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="w-full h-full">
                                @php $no = 0; @endphp
                                @foreach ($transaction as $ts)
                                    @csrf
                                    @php
                                        $no++;
                                        $statusPaid = $ts->status;
                                        if ($statusPaid == 'Unpaid'):
                                            $badge = 'bg-yellow-100 text-yellow-800';
                                        elseif ($statusPaid == 'Paid/ Waiting'):
                                            $badge = 'bg-blue-100 text-blue-800';
                                        elseif ($statusPaid == 'Complete'):
                                            $badge = 'bg-green-100 text-green-800';
                                        else:
                                        endif;
                                    @endphp
                                    <!-- Product 1 -->
                                    <tr class="bg-white mt-5 border-b w-full hover:bg-gray-50" href="#">
                                        <td
                                            class="spaceUnder w-16 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <a href="javascript:void(0)" thisid="{{ $ts->id_transaction }}"
                                                data-modal-toggle="detail-trans-modal"
                                                class="detail-trans text-xs text-blue-600 hover:text-blue-800 uppercase font-semibold tracking-wide">
                                                {{ $ts->id_transaction }}
                                            </a>
                                        </td>
                                        <td class=" spaceUnder text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                            {{ $ts->aliases }}
                                        </td>
                                        <td class="spaceUnder text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                            Rp {{ number_format($ts->amount) }}
                                        </td>
                                        <td class="spaceUnder text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                            {{ date_format($ts->created_at, 'D, m/Y - H:i') }}
                                        </td>
                                        <td class="spaceUnder text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="{{ $badge }} text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md">
                                                {{ $ts->status }}
                                            </span>
                                        </td>
                                        <td></td>
                                    </tr>

                                @endforeach
                        </table>
                    @endif

                </div>
            </div>
        </div>

        <div class="text-center p-5">
            {!! $transaction->links() !!}
        </div>
    </div>
@endsection

@push('modals')
    @include('pages/transaction/detail_transaction')
@endpush

@push('js-pages')
    <script src="{{ asset('js/app-transaction.js') }}"></script>
@endpush
