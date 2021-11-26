@extends('layouts.app')

@section('content')
    <section class="w-full bg-white mt-12 md:mt-5">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col lg:flex-row">
                <div
                    class="relative w-full bg-cover rounded-3xl lg:w-6/12 xl:w-7/12 bg-gradient-to-r from-white via-white to-gray-100">
                    <div
                        class="relative flex flex-col items-center justify-center w-full h-full px-10 my-20 lg:px-16 lg:my-0">
                        <div class="flex flex-col items-start space-y-8 tracking-tight lg:max-w-3xl">
                            <div class="relative">
                                <p class="mb-2 font-medium uppercase text-green-400">
                                    <svg version="1.1" id="logo" class="h-10" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" height="50">
                                        <image href="{{ asset('img/app-img/logo.svg') }}" height="35" />
                                    </svg>
                                </p>
                                <h3 class="text-3xl font-bold text-gray-900 xl:text-6xl">
                                    Beramal tidak akan mengurangi
                                    kekayaanmu
                                </h3>
                            </div>
                            <p class="text-gray-700">Jika kamu ingin berdoa kepada Allah untuk kebutuhan hidup yang
                                lebih baik, maka pertama-tama berikanlah sesuatu dalam amal.Jika kamu ingin berdoa kepada
                                Allah untuk kebutuhan hidup yang lebih baik, maka pertama-tama berikanlah sesuatu dalam
                                amal.</p>
                        </div>
                    </div>
                </div>

                <div class="w-full bg-white lg:w-6/12 xl:w-5/12">
                    <div class="flex flex-col items-start justify-start w-full h-full p-5 lg:p-8">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h4 class="w-full text-3xl font-bold">Signup</h4>
                            <p class="text-lg text-gray-500">or, if you have an account you can
                                <a href="{{ route('login') }}" class="text-green-400 underline">sign in</a>
                            </p>
                            <div class="relative w-full mt-10 space-y-8">
                                <div class="relative">
                                    <label class="font-medium text-gray-900">Name</label>
                                    <input
                                        class="font-bold  shadow-sm bg-gray-100 focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5
                                        @error('name') is-invalid @enderror"
                                        placeholder="Enter Your Name" id="name" type="text" class=""
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <p class="text-red-500"><strong>{{ $message }}</strong></p>
                                        </span>
                                    @enderror
                                </div>
                                <div class="relative">
                                    <label class="font-medium text-gray-900">Email</label>
                                    <input
                                        class="font-bold  shadow-sm bg-gray-100 focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5
                                        @error('email') is-invalid @enderror"
                                        placeholder="Enter Your Email Address" id="email" type="email" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <p class="text-red-500"><strong>{{ $message }}</strong></p>
                                        </span>
                                    @enderror
                                </div>
                                <div class="relative">
                                    <label class="font-medium text-gray-900">Password</label>
                                    <input
                                        class="mb-4 font-bold  shadow-sm bg-gray-100 focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5
                                        @error('password') is-invalid @enderror"
                                        placeholder="Password" id="password" type="password" name="password" required
                                        autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <p class="text-red-500"><strong>{{ $message }}</strong></p>
                                        </span>
                                    @enderror

                                    <input
                                        class="font-bold  shadow-sm bg-gray-100 focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                        placeholder="Confirm Password" id="password-confirm" type="password"
                                        class="form-control" name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>

                                <div class="relative">
                                    <button
                                        class="w-full  px-3 py-3 font-bold text-white bg-green-400 rounded-xl hover:bg-green-500">
                                        <div class="flex flex-row justify-center items-center">
                                            <i class="fe fe-log-in fe-14 mr-3"></i>
                                            <p>Register</p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
