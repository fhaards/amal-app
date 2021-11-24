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


            <div class="md:flex">
                <div class="flex-initial md:mr-5  bg-white shadow-lg border border-gray-100 rounded-lg max-w-sm">
                    <div
                        class="p-8 h-32 relative flex justify-center rounded-t-lg bg-gradient-to-r from-green-400 to-green-200">
                        <img class="rounded-lg items-center w-xl absolute" src="{{ asset('img/app-example/face.jpg') }}"
                            alt="" />
                    </div>
                    <div class="p-5 mt-12">
                        <a href="#">
                            <h5 class="capitalize text-gray-900 font-bold text-2xl tracking-tight mb-2">
                                {{ $user->name }}
                            </h5>
                        </a>
                        <span
                            class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md mr-2">
                            <svg class="w-3 h-3 mr-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            {{ Auth::user()->created_at }}
                        </span>
                        <p class="font-normal text-gray-700 mb-3">Here are the biggest enterprise technology acquisitions of
                            2021
                            so far, in reverse chronological order.</p>
                        <a href="{{ route('profile.edit', $user->id) }}"
                            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center">
                            <i class="fe fe-settings fe-16"></i>
                        </a>
                    </div>
                </div>

                <div class="flex-1 bg-white mt-5 md:mt-0 p-6 shadow-lg border border-gray-100 rounded-lg">
                    @yield('profile-contents')
                </div>
            </div>
        </div>
    </section>
@endsection
