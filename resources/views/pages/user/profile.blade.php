@extends('layouts.app')

@section('content')
    @php $curUrl = Request::segment(1);  @endphp

    <section class="pt-16 md:pt-10 pb-20 bg-white md:px-0 w-full " id="profile-pages">
        <div class="container items-center md:max-w-6xl px-8 mx-auto xl:px-0 w-full">

            @if (session('status'))
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    {{ __('You are logged in!') }}
                </div>
            @endif



            <div class="flex md:flex-row flex-col md:gap-10 h-full">
                <div class="flex-none max-w-sm flex flex-col gap-5">
                    <div class="bg-white relative rounded-lg">

                        <div
                            class="h-24 relative flex justify-center rounded-t-lg bg-gradient-to-r from-primary to-white">
                            <div
                                class="border-solid border-4 border-white rounded-full w-32 h-32 absolute mt-8 bg-white flex items-center justify-center">
                                @if ($user->user_photo != null)
                                    <img class="rounded-full items-center w-full h-full object-cover"
                                        src="{{ asset("storage/user/avatars/$user->user_photo") }}" alt="" />
                                @else
                                    <span class="text-gray-400 text-xs tracking-widest">NO IMAGE</span>
                                @endif

                            </div>

                        </div>
                        <a href="{{ route('profile-edit-photo', $user->id) }}"
                            class="hidden md:block absolute -mt-12 ml-16 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 font-medium rounded-sm text-xs p-1.5 text-center inline-flex items-center">
                            <i class="fe fe-edit fe-10"></i>
                        </a>
                        <div class="p-5 mt-16 flex flex-col gap-2">
                            <div class="text-center max-w-48 w-48">
                                <h5 class="uppercase text-gray-900 font-bold text-sm tracking-wide mb-4 py-0">
                                    {{ $user->name }}
                                </h5>
                                <p class="font-medium text-sm text-gray-600 my-0 py-0">{{ $user->email }}</p>
                                <span
                                    class="mt-2 bg-gray-100  text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md mr-2">
                                    <svg class="w-3 h-3 mr-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-xs text-gray-500 font-semibold">
                                        {{ $user->created_at->diffForHumans() }}
                                        {{-- {{ date('D, m/Y', strtotime($user->created_at)) }} </span> --}}
                                    </span>
                            </div>
                            <div class="md:hidden pt-2 pb-1 mt-2 mb-1 border-t">
                                <a href="{{ route('profile-edit-photo', $user->id) }}"
                                    class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-2 text-center inline-flex gap-2 items-center">
                                    <i class="fe fe-edit fe-12"></i> Edit Foto
                                </a>
                                <a href="{{ route('profile.edit', $user->id) }}"
                                    class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-2 text-center inline-flex gap-2 items-center">
                                    <i class="fe fe-settings fe-12"></i>
                                    <span class=""></span> Ubah Profil
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-4">
                        <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-1" for="name">
                            Total
                        </label>
                        <span class="total-amal text-sm text-gray-600 font-bold"> </span>
                    </div>

                    <div class="w-full sm:p-0 p-2 fixed bottom-0 left-0 sm:relative z-30">
                        <div
                            class="flex flex-nowrap max-w-full gap-2 sm:gap-0 overflow-x-auto flex-row sm:flex-col bg-white rounded-lg border border-gray-200 shadow-xl sm:shadow-none sm:py-0 py-2">
                            <a href="{{ route('transaction.index') }}" type="button"
                                class="{{ $curUrl == 'transaction' ? 'text-primary' : ''}}  sm:w-full w-56 inline-flex px-4 py-2 flex flex-col sm:flex-row sm:text-left text-center gap-1 sm:gap-3 hover:bg-gray-100 text-sm  sm:border-b border-gray-200  items-center">
                                <i class="order-first fe fe-dollar-sign fe-16"></i>
                                <div class="font-semibold hidden sm:block">Transaksi</div>
                            </a>
                            <a href="{{ route('profile.index') }}" type="button"
                                class="{{ $curUrl == 'profile' ? 'text-primary' : ''}} font-bold sm:w-full w-56 inline-flex px-4 py-2 flex-col sm:flex-row sm:text-left text-center gap-1 sm:gap-3 hover:bg-gray-100 text-sm sm:border-b border-gray-200 items-center">
                                <i class="order-first fe fe-user fe-16"></i>
                                <div class="font-semibold hidden sm:block">Profil</div>
                            </a>
                            @if ($user->user_group == 'admin')
                                <a href="{{ route('payment.index') }}" type="button"
                                    class="{{ $curUrl == 'payment' ? 'text-primary' : ''}} sm:w-full w-56 inline-flex px-4 py-2 flex flex-col sm:flex-row sm:text-left text-center gap-1 sm:gap-3 hover:bg-gray-100 text-sm sm:border-b border-gray-200 items-center">
                                    <i class=" order-first fe fe-credit-card fe-16"></i>
                                    <div class="font-semibold hidden sm:block">Metode Pembayaran</div>
                                </a>
                                <a href="{{ route('companies.index') }}" type="button"
                                    class="{{ $curUrl == 'companies' ? 'text-primary' : ''}} sm:w-full w-56 inline-flex px-4 py-2 flex flex-col sm:flex-row sm:text-left text-center gap-1 sm:gap-3 hover:bg-gray-100 text-sm sm:border-b border-gray-200 items-center">
                                    <i class=" order-first fe fe-feather fe-16"></i>
                                    <div class="font-semibold hidden sm:block">Tentang</div>
                                </a>
                                <a href="{{ route('homecontent.index') }}" type="button"
                                    class="{{ $curUrl == 'homecontent' ? 'text-primary' : ''}} sm:w-full w-56 inline-flex px-4 py-2 flex flex-col sm:flex-row sm:text-left text-center gap-1 sm:gap-3 hover:bg-gray-100 text-sm sm:border-b border-gray-200 items-center">
                                    <i class=" order-first fe fe-image fe-16"></i>
                                    <div class="font-semibold hidden sm:block">Slider</div>
                                </a>
                            @endif

                            <a href="{{ route('profile.edit', $user->id) }}" type="button"
                                class="sm:w-full w-56 inline-flex px-4 py-2  flex-col sm:flex-row sm:text-left text-center gap-1 sm:gap-3 hover:bg-gray-100 text-sm sm:rounded-b-lg  items-center">
                                <i
                                    class=" order-first fe fe-settings fe-16"></i>
                                <div class="font-semibold hidden sm:block">Pengaturan</div>
                            </a>
                        </div>
                    </div>
                </div>

                @yield('profile-contents')

            </div>
        </div>
    </section>


@endsection

@push('js-pages')
    <script src="{{ asset('js/app-profile.js') }}"></script>
@endpush
