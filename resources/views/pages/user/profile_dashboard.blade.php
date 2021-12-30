@extends('pages.user.profile')

@section('profile-contents')
    <div class="flex flex-col h-auto w-full sm:gap-4 gap-2">
        <div
            class="sm:h-48 w-full bg-white my-5 md:my-0 py-6 px-6 rounded-xl bg-gradient-to-r from-white to-green-400">
            <p class="text-green-500 sm:text-xl font-bold pt-4 pb-2">
                Halo, Selamat Datang Kembali
            </p>
            <div class="text-gray-800 sm:text-3xl font-bold">
                {{ $user->name }}
            </div>
        </div>
        <div
            class="rounded-xl font-bold bg-gradient-to-r from-white to-green-300 text-gray-800 border-bottom-1 flex justify-between flex-row p-5">
            <div class="">
                Transaksi Terakhir
            </div>
            <div class="">
                <a href="{{ route('transaction.index') }}" class="">
                    <span>Lihat Semua Transaksi </span>
                    <span class="fe fe-arrow-right"></span>
                </a>
            </div>
        </div>

        @if ($transaction->isEmpty())
            <div class="text-center p-2 h-24 flex items-center justify-center">
                <span class="text-xs font-semibold text-gray-400">
                    Data pada tabel tidak ditemukan
                    @if (Auth::user()->user_group == 'user')
                        , <a class="text-blue-500" href="{{ route('beramal') }}"> klik </a> untuk menuju
                        halaman beramal
                    @endif

                </span>
            </div>
        @else
            <div class="overflow-x-auto sm:-mx-6">
                <div class="inline-block min-w-full sm:px-6">
                    <div class="overflow-hidden sm:rounded-xl border">
                        <table class="max-w-full w-full h-100 table-list" id="table-trans">
                            <thead class="rounded-t-xl bg-gray-100">
                                <tr class="">
                                    <td scope="col"
                                        class="text-xs bg-gray-50 font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                        id / No
                                    </td>
                                    <td scope="col" width="30%"
                                        class="text-xs bg-gray-50 font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                        Alias
                                    </td>
                                    <td scope="col" width="20%"
                                        class="text-xs bg-gray-50 font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider">
                                        Nominal
                                    </td>
                                    <td scope="col" width="5%"
                                        class="text-xs bg-gray-50 font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider text-right">
                                        Dibuat
                                    </td>
                                    @if ($user->user_group == 'admin')
                                        <td scope="col" width="5%"
                                            class="text-xs bg-gray-50 font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider text-right">
                                            Status
                                        </td>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="w-full h-full">
                                @php $no = 0; @endphp
                                @foreach ($transaction as $ts)
                                    @csrf
                                    @php
                                        $idtrans = $ts->id_transaction;
                                        $no++;
                                        $statusPaid = $ts->status;
                                        if ($statusPaid == 'Unpaid'):
                                            $badge = 'bg-yellow-100 text-yellow-800';
                                        elseif ($statusPaid == 'Paid / Waiting'):
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
                                            <span class="text-xs hover:text-blue-800 uppercase font-semibold tracking-wide">
                                                {{ substr($idtrans, 0, 18) . ' ...' }}
                                            </span>
                                        </td>
                                        <td class=" spaceUnder text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                            {{ Str::length($ts->aliases) > 10 ? substr($ts->aliases, 0, 10) . ' ...' : $ts->aliases }}
                                        </td>
                                        <td class="spaceUnder text-sm text-gray-500 px-6 py-4 whitespace-nowrap">
                                            Rp {{ number_format($ts->amount) }}
                                        </td>
                                        <td class="spaceUnder text-sm text-gray-500 px-6 py-4 whitespace-nowrap text-right">
                                            {{ $ts->created_at->diffForHumans() }}
                                        </td>
                                        @if ($user->user_group == 'admin')
                                            <td
                                                class="spaceUnder text-sm text-gray-500 px-6 py-4 whitespace-nowrap text-right">
                                                <span
                                                    class="{{ $badge }} text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md">
                                                    {{ $ts->status }}
                                                </span>
                                            </td>
                                        @endif
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
