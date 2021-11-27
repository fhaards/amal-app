@extends('pages.user.profile')

@section('profile-contents')
    <div class="md:mt-0 mt-4 flex flex-1 flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-xl shadow-sm">
                    <h5 class=" font-semibold mb-5">
                        Tabel Transaksi
                    </h5>
                    @if ($transaction->isEmpty())
                        <div class="text-center p-5 h-48 flex items-center justify-center">
                            <span class="text-xs font-semibold text-gray-400">
                                Data pada tabel tidak ditemukan ,
                                <a class="text-blue-500" href="{{ route('beramal') }}"> klik </a> untuk menuju halaman
                                beramal
                            </span>
                        </div>
                    @else
                        <table class="min-w-full w-100 h-100 table-list" id="">
                            <thead class="border rounded-t-xl bg-gray-100">
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
                                    {{-- <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th> --}}
                                </tr>
                            </thead>
                            <tbody class="w-full h-full">
                                @foreach ($transaction as $ts)
                                    <!-- Product 1 -->
                                    <tr class="bg-white mt-5 border border-b w-full hover:bg-gray-50 ">
                                        <td
                                            class="spaceUnder w-16 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $ts->id_transaction }}
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
                                            {{ $ts->status }}
                                        </td>
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

