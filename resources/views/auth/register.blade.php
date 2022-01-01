@extends('layouts.app')

@section('content')
    <section class="w-full sm:bg-white">
        <div class="mx-auto sm:max-w-7xl py-8">
            <div class="flex flex-col md:flex-row">
                <div class="relative w-full bg-cover rounded-3xl md:w-6/12 xl:w-7/12 sm:bg-gradient-to-r from-white via-white to-gray-100">
                    <div class="px-16 my-20 sm:px-16 sm:my-0  relative flex flex-col items-center justify-center w-full h-full">
                        <div class="flex flex-col items-start space-y-8 tracking-tight lg:max-w-3xl">
                            <div class="relative">
                                <div class="w-full flex flex-row sm:justify-start justify-center mb-4">
                                    <img src="{{ asset('img/app-img/logo.png') }}" class="img-responsive w-24 sm:w-24" />
                                </div>
                                <h3 class="sm:text-3xl text-xl font-bold text-gray-900 xl:text-6xl text-center sm:text-left">
                                    Beramal tidak akan mengurangi
                                    kekayaanmu
                                </h3>
                            </div>
                            <p class="text-gray-700 text-sm sm:text-base text-center sm:text-left">Jika kamu ingin berdoa kepada Allah untuk kebutuhan hidup yang
                                lebih baik, maka pertama-tama berikanlah sesuatu dalam amal.Jika kamu ingin berdoa kepada
                                Allah untuk kebutuhan hidup yang lebih baik, maka pertama-tama berikanlah sesuatu dalam
                                amal.</p>
                        </div>
                    </div>
                </div>

                <div class="w-full mt-5 md:mt-0 sm:pt-0 pt-8 md:w-2/5 z-0 px-8 sm:px-0 sm:bg-transparent bg-white rounded-t-2xl sm:rounded-0">
                    <div class="flex flex-col items-end items-center justify-start w-100 h-full  ">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h4 class="w-full text-3xl font-bold">Registrasi</h4>
                            <p class="text-lg text-gray-500">atau, jika kamu sudah memiliki akun
                                <a href="{{ route('login') }}" class="text-green-400 underline">klik masuk</a>
                            </p>
                            <div class="relative w-full mt-10 space-y-8">
                                <div class="relative">
                                    <label class="font-medium text-gray-900">Nama</label>
                                    <input
                                        class="font-bold focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5
                                        @error('name') is-invalid @enderror"
                                        placeholder="Ketikan Nama " id="name" type="text" class=""
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
                                        class="font-bold focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5
                                        @error('email') is-invalid @enderror"
                                        placeholder="Ketikan Email Saya" id="email" type="email" name="email"
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
                                        class="mb-4 font-bold focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5
                                        @error('password') is-invalid @enderror"
                                        placeholder="Password" id="password" type="password" name="password" required
                                        autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <p class="text-red-500"><strong>{{ $message }}</strong></p>
                                        </span>
                                    @enderror

                                    <input
                                        class="font-bold focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                        placeholder="Konfirmasi Password" id="password-confirm" type="password"
                                        class="form-control" name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>

                                <div class="relative">
                                    <button
                                        class="w-full  px-3 py-3 font-bold text-white bg-primary rounded-xl hover:bg-primary">
                                        <div class="flex flex-row justify-center items-center">
                                            <i class="fe fe-log-in fe-14 mr-3"></i>
                                            <p>Registrasi</p>
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
