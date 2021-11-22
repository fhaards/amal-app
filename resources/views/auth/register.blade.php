@extends('layouts.app')

@section('content')
    <section class="w-full bg-white">

        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col lg:flex-row">
                <div class="relative w-full bg-cover lg:w-6/12 xl:w-7/12 bg-gradient-to-r from-white via-white to-gray-100">
                    <div
                        class="relative flex flex-col items-center justify-center w-full h-full px-10 my-20 lg:px-16 lg:my-0">
                        <div class="flex flex-col items-start space-y-8 tracking-tight lg:max-w-3xl">
                            <div class="relative">
                                <p class="mb-2 font-medium uppercase text-green-400">A M A L</p>
                                <h3 class="text-3xl font-bold text-gray-900 xl:text-6xl">
                                    Beramal tidak akan mengurangi
                                    kekayaanmu
                                </h3>
                            </div>
                            <p class="text-xl text-gray-700">Jika kamu ingin berdoa kepada Allah untuk kebutuhan hidup yang
                                lebih baik, maka pertama-tama berikanlah sesuatu dalam amal.Jika kamu ingin berdoa kepada
                                Allah untuk kebutuhan hidup yang lebih baik, maka pertama-tama berikanlah sesuatu dalam
                                amal.</p>
                        </div>
                    </div>
                </div>

                <div class="w-full bg-white lg:w-6/12 xl:w-5/12">
                    <div class="flex flex-col items-start justify-start w-full h-full p-10 lg:p-16 xl:p-24">
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
                                        class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 focus:outline-none focus:ring-4 focus:ring-green-400 focus:ring-opacity-50 rounded-3xl"
                                        placeholder="Enter Your Name" id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <p class="text-red-500"><strong>{{ $message }}</strong></p>
                                        </span>
                                    @enderror
                                </div>
                                <div class="relative">
                                    <label class="font-medium text-gray-900">Email</label>
                                    <input
                                        class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 focus:outline-none focus:ring-4 focus:ring-green-400 focus:ring-opacity-50 rounded-3xl"
                                        placeholder="Enter Your Email Address" id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
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
                                        class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 focus:outline-none focus:ring-4 focus:ring-green-400 focus:ring-opacity-50 rounded-3xl"
                                        placeholder="Password" id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <p class="text-red-500"><strong>{{ $message }}</strong></p>
                                        </span>
                                    @enderror

                                    <input
                                        class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 focus:outline-none focus:ring-4 focus:ring-green-400 focus:ring-opacity-50 rounded-3xl"
                                        placeholder="Confirm Password" id="password-confirm" type="password"
                                        class="form-control" name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>

                                <div class="relative">
                                    <button type="submit"
                                        class="inline-block w-full px-5 py-4 text-lg font-medium text-center text-white transition duration-200 bg-green-400 hover:bg-green-500 ease rounded-3xl">
                                        {{ __('Register') }}
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
