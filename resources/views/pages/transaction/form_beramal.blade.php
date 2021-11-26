@extends('layouts.app')

@section('content')
    <section
        class="md:mt-0 mt-16 md:min-h-screen w-full px-8 py-16 bg-gray-100 xl:px-8 justify-items-center items-center flex">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col items-center md:flex-row h-auto">
                <div class="w-full space-y-5 md:w-3/5 md:pr-16">
                    <p class="font-medium text-green-400 uppercase">
                        <svg version="1.1" id="logo" class="h-10" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" height="50">
                            <image href="{{ asset('img/app-img/logo.svg') }}" height="35" />
                        </svg>
                    </p>
                    <h2 class="text-2xl font-extrabold leading-none text-black sm:text-3xl md:text-5xl">
                        Amal yang kamu berikan akan menjadi naunganmu pada hari penghakiman.
                    </h2>
                    <p class="text-xl text-gray-600 md:pr-16">
                        Nabi Muhammad (SAW) bersabda: 'Bayangan orang beriman pada hari kiamat akan menjadi amal kasihnya'
                    </p>
                </div>

                <div class="w-full mt-16 md:mt-0 md:w-2/5">
                    <form method="POST" action="{{route('beramal-insert')}}" id="#form-beramal">
                        <div
                            class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 shadow-2xl px-7 rounded-xl">
                            <h3 class="mb-6 text-2xl font-medium text-center">Mulai Beramal</h3>
                            @csrf
                            {{-- <input type="text" name="user_group" value="superadmin"> --}}
                            <div class="form-group row mb-4">
                                <div class="col-md-6">
                                    <input id="aliases" type="text" placeholder="Alias / Nama Asli"
                                        class="aliases font-bold shadow-sm bg-gray-100 focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 
                                        @error('aliases') is-invalid @enderror"
                                        name="aliases" value="{{ old('aliases') }}" required autocomplete="email"
                                        autofocus>

                                    @error('aliases')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-md-6">
                                    <input id="amount" type="currency" min="0" step="0.01" placeholder="Nominal"
                                        class="amount font-bold  shadow-sm bg-gray-100 focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 
                                        @error('amount') is-invalid @enderror"
                                        name="amount" value="{{ old('amount') }}" required autocomplete="email" autofocus>

                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="block">
                                <button
                                    class="w-full  px-3 py-3 font-bold text-white bg-green-400 rounded-xl hover:bg-green-500">
                                    <div class="flex flex-row justify-center items-center">
                                        <p>Beramal</p>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js-pages')
    <script src="{{ asset('js/app-beramal.js') }}"></script>
@endpush
