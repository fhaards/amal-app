@extends('layouts.app')

@section('content')
    <section class="w-full pt-16 md:py-24 bg-green-100 xl:px-8">
        <div class="max-w-6xl sm:mx-auto">
            <div class="flex flex-col items-center md:flex-row md:px-0">
                <div class="px-8 sm:pr-24 my-20 sm:px-0 sm:my-0 w-full space-y-5 md:w-3/5 md:bg-transparent bg-green-100 ">
                    <p class="font-medium text-green-400 uppercase">
                        <svg version="1.1" id="logo" class="h-10" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" height="50">
                            <image href="{{ asset('img/app-img/logo.svg') }}" height="35" />
                        </svg>
                    </p>
                    <h3 class="text-3xl font-bold text-gray-900 xl:text-6xl">
                        Tersenyum di wajah
                        saudaramu adalah tindakan amal.
                    </h3>
                    <p class="text-gray-700">Sabarlah dalam doa, lakukan amal yang teratur, dan tundukkan
                        kepalamu dengan orang yang sujud (dalam ibadah).</p>
                </div>

                <div class="w-full mt-16 md:mt-0 md:w-2/5 z-0">
                    <form method="POST" action="{{ route('login') }}">
                        <div class="relative z-0 h-auto px-8 sm:px-0 py-16 sm:py-10 sm:px-10 overflow-hidden bg-white sm:border-b-2 sm:border-gray-300 sm:shadow-2xl sm:rounded-xl">
                            <h3 class="mb-6 text-2xl font-medium text-center">Sign in to your Account</h3>
                            @csrf
                            {{-- <input type="text" name="user_group" value="superadmin"> --}}
                            <div class="form-group row mb-4">
                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="Email address"
                                        class="font-bold focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 
                                        @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback text-red-500 py-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="font-bold focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5
                                        @error('password') is-invalid @enderror"
                                        placeholder="Password"
                                        name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row py-4">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check w-full mt-4 text-sm text-gray-500">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="block">
                                <button
                                    class="w-full  px-3 py-3 font-bold text-white bg-green-400 rounded-xl hover:bg-green-500">
                                    <div class="flex flex-row justify-center items-center">
                                        <i class="fe fe-log-in fe-14 mr-3"></i>
                                        <p>Sign In</p>
                                    </div>
                                </button>
                            </div>
                            <p class="w-full mt-4 text-sm text-center text-gray-500"> Don't have an account?
                                <a href="{{ route('register') }}" class="text-blue-500 underline">
                                    Sign up here</a>
                            </p>
                            @if (Route::has('password.request'))
                                <p class="w-full mt-4 text-sm text-center text-gray-500">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </p>
                            @endif
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input type="text" name="user_group" value="superadmin">
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
