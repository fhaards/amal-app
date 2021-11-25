@extends('layouts.app')

@section('content')
    <section class="pt-10 pb-20 bg-white md:px-0 w-full">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-0 w-full">

            @if (session('status'))
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    {{ __('You are logged in!') }}
                </div>
            @endif


            <div class="md:flex md:gap-5">
                <div class="flex flex-col gap-5  max-w-md w-md">
                    <div class="bg-white relative shadow-sm border border-gray-100 rounded-lg">

                        <div class="h-24 relative flex justify-center rounded-t-lg bg-gradient-to-r from-green-400 to-green-200">
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
                            class="absolute ml-5 -mt-16 hover:text-green-700 text-white bg-transparent font-medium rounded-lg text-xs text-center items-center">
                            <i class="fe fe-edit fe-16"></i>
                        </a>
                        <div class="p-5 mt-24 flex flex-col gap-2">
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
                            <div class="pt-2 pb-1 mt-2 mb-1 border-t">
                                <a href="{{ route('profile.edit', $user->id) }}"
                                    class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-2 text-center inline-flex gap-2 items-center">
                                    <i class="fe fe-settings fe-12"></i>
                                    <span class=""></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow-sm border border-gray-100 rounded-lg p-4">
                        <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2" for="name">
                            Total Amal
                        </label>
                    </div>
                </div>

                <div class="flex-1 bg-white mt-5 md:mt-0 p-6 shadow-sm border border-gray-100 rounded-lg">
                    @yield('profile-contents')
                </div>
            </div>
        </div>
    </section>
@endsection
