@extends('layouts.app')

@section('content')
    <section class="pt-16 md:pt-10 pb-20 bg-white md:px-0 w-full ">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-0 w-full">

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
                    <div class="bg-white relative shadow-sm border border-gray-200 rounded-lg">

                        <div
                            class="h-24 relative flex justify-center rounded-t-lg bg-gradient-to-r from-green-400 to-green-200">
                            <div class="border-solid border-4 border-white rounded-full w-32 h-32 absolute mt-8 bg-red-200">
                                @if ($user->user_photo == null)
                                    @php $userphoto = 'user-default.png'; @endphp
                                @else
                                    @php $userphoto = $user->user_photo; @endphp
                                @endif
                                <img class="rounded-full items-center w-full h-full object-cover"
                                    src="{{ asset("storage/user/avatars/$userphoto") }}" alt="" />
                            </div>

                        </div>
                        <a href="{{ route('profile-edit-photo', $user->id) }}"
                            class="hidden md:block absolute -mt-12 ml-16 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 font-medium rounded-sm text-xs p-1.5 text-center inline-flex items-center">
                            <i class="fe fe-edit fe-10"></i>
                        </a>
                        <div class="p-5 mt-16 flex flex-col gap-2">
                            <div class="text-center">
                                <h5 class="uppercase text-gray-900 font-bold text-1xl tracking-wide my-0 py-0">
                                    {{ $user->name }}
                                </h5>
                                <p class="font-medium text-sm text-gray-600 my-0 py-0">{{ $user->email }}</p>
                                <span
                                    class="mt-2 bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md mr-2">
                                    <svg class="w-3 h-3 mr-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Join At : {{ Auth::user()->created_at }}
                                </span>
                            </div>
                            <div class="md:hidden pt-2 pb-1 mt-2 mb-1 border-t">
                                <a href="{{ route('profile-edit-photo', $user->id) }}"
                                    class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-2 text-center inline-flex gap-2 items-center">
                                    <i class="fe fe-edit fe-12"></i> Edit Photo
                                </a>
                                <a href="{{ route('profile.edit', $user->id) }}"
                                    class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-2 text-center inline-flex gap-2 items-center">
                                    <i class="fe fe-settings fe-12"></i>
                                    <span class=""></span> Edit profile
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="{{ Auth::user()->user_group != 'user' ? 'hidden' : '' }} bg-white shadow-sm border border-gray-200 rounded-lg p-4">
                        <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2" for="name">
                            Total Amal
                        </label>
                    </div>
                    <div class="hidden md:block shadow-sm bg-white rounded-lg border border-gray-200 w-100">
                        <a href="{{ route('transaction.index') }}" type="button"
                            class="px-4 py-2 flex gap-3 hover:bg-gray-100 text-gray-900 text-sm font-medium border-b border-gray-200 focus:z-1 focus:ring-2 focus:ring-green-400 focus:text-green-400 w-full items-center">
                            <i class="order-first fe fe-dollar-sign fe-12"></i>
                            <div>Transaction</div>
                        </a>
                        @if (Auth::user()->user_group == 'admin')
                            <a href="{{ route('payment.index') }}" type="button"
                                class="px-4 py-2 flex gap-3 hover:bg-gray-100 text-gray-900 text-sm font-medium border-b border-gray-200 focus:z-1 focus:ring-2 focus:ring-green-400 focus:text-green-400 w-full items-center">
                                <i class="order-first fe fe-credit-card fe-12"></i>
                                <div>Payment Method</div>
                            </a>
                        @endif
                        <a href="{{ route('profile.index') }}" type="button"
                            class="px-4 py-2 flex gap-3 hover:bg-gray-100 text-gray-900 text-sm font-medium border-b border-gray-200 focus:z-1 focus:ring-2 focus:ring-green-400 focus:text-green-400 w-full rounded-t-lg items-center">
                            <i class="order-first fe fe-user fe-12"></i>
                            <div>Profile</div>
                            <span
                                class="order-last fe fe-alert-circle fe-6 text-red-500 font-bold {{ $user->user_phone != null && $user->user_address != null ? 'hidden' : '' }}"></span>
                        </a>
                        <a href="{{ route('profile.edit', $user->id) }}" type="button"
                            class="px-4 py-2 flex gap-3 hover:bg-gray-100 text-gray-900 text-sm font-medium focus:z-1 focus:ring-2 focus:ring-green-400 focus:text-green-400 w-full rounded-b-lg  items-center">
                            <i class="order-first fe fe-settings fe-12"></i>
                            <div>Settings</div>
                            <span
                                class="fe fe-alert-circle fe-6 text-red-500 font-bold {{ $user->user_phone != null && $user->user_address != null ? 'hidden' : '' }}"></span>
                        </a>
                    </div>
                </div>

                @yield('profile-contents')

            </div>
        </div>
    </section>
@endsection
