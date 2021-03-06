@extends('layouts.app')

@section('content')
    <section class="overflow-hidden md:mt-0  w-full md:py-24 md:bg-green-50 justify-items-center items-center">
        <div class="container md:max-w-6xl mx-auto flex md:flex-row flex-col">
            <div class="flex flex-1">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $message)
                        <div id="alert-2" class="flex gap-3 bg-red-100 rounded-lg p-4 mb-4 items-center text-red-700"
                            role="alert">
                            <i class="font-medium fe fe-alert-circle fe-12"></i>
                            <div class="ml-3 text-sm font-medium text-red-700">
                                {{ $message }}
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8"
                                data-collapse-toggle="alert-2" aria-label="Close">
                                <span class="sr-only">Dismiss</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                @endif
            </div>
            
            <div class="w-full space-y-5 md:w-3/5 md:pr-16 md:px-0 px-8 md:mt-0 mt-24">
                <div class="md:bg-transparent bg-green-100 p-5 md:p-0 rounded-xl">
                    <p class="font-medium mb-7 text-primary uppercase">
                        <img src="{{ asset('img/app-img/logo.png') }}" class="img-responsive h-24 sm:h-24" />
                    </p>

                    <div class="md:text-2xl mb-7 font-extrabold leading-none text-black sm:text-3xl md:text-5xl">
                        Amal yang kamu berikan akan menjadi naunganmu pada hari penghakiman.
                    </div>
                    <div class="text-xs font-semibold tracking-wide md:text-xl mb-7 text-gray-600  md:pr-16 ">
                        Nabi Muhammad (SAW) bersabda: ' Bayangan orang beriman pada hari kiamat akan menjadi amal kasihnya '
                    </div>
                </div>
            </div>

            <div class="w-full max-w-100  mt-5 md:mt-0 md:w-2/5 bg-white md:rounded-xl md:shadow-xl">
                {{-- <form method="POST" action="{{route('beramal-insert')}}" id="#form-beramal">
                        <div
                            class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 shadow-2xl px-7 rounded-xl">
                            <h3 class="mb-6 text-2xl font-medium text-center">Mulai Beramal</h3>
                            @csrf
                            <div class="form-group row mb-4">
                                <div class="col-md-6">
                                    <input id="aliases" type="text" placeholder="Alias / Nama Asli"
                                        class="aliases font-bold shadow-sm bg-gray-100 focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 
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
                                        class="amount font-bold  shadow-sm bg-gray-100 focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 
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
                                    class="w-full  px-3 py-3 font-bold text-white bg-primary rounded-xl hover:bg-primary">
                                    <div class="flex flex-row justify-center items-center">
                                        <p>Beramal</p>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form> --}}
                {{-- <form method="POST" action="{{ route('beramal-insert') }}" id="#form-beramal"> --}}
                <div x-data="app()" x-cloak>
                    <div class="max-w-3xl mx-auto p-10" id="form-beramal">
                        @csrf
                        <input type="hidden" class="user_id" name="user_id" value="{{ $user->id }}">
                        <div x-show.transition="step === 'complete'">
                            <div class="p-10 flex items-center justify-between">
                                <div>
                                    <svg class="mb-4 h-20 w-20 text-primary mx-auto" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Success
                                    </h2>

                                    <div class="text-gray-600 mb-8">
                                        Terima kasih, kami sangat menghargai berapapun nominal uang yang diberikan.
                                        semoga Allah membalasmu dengan kebaikan.
                                    </div>

                                    <button @click="step = 1"
                                        class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">
                                        Kembali ke beranda
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div x-show.transition="step != 'complete'">
                            <!-- Top Navigation -->
                            <div class="border-b-2 py-4">
                                <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                                    x-text="`Step: ${step} of 3`"></div>
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="flex-1">
                                        <div x-show="step === 1">
                                            <div class="text-lg font-bold text-gray-700 leading-tight">
                                                Pribadi
                                            </div>
                                        </div>

                                        <div x-show="step === 2">
                                            <div class="text-lg font-bold text-gray-700 leading-tight">
                                                Pembayaran
                                            </div>
                                        </div>

                                        <div x-show="step === 3">
                                            <div class="text-lg font-bold text-gray-700 leading-tight">
                                                Detail
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center md:w-64">
                                        <div class="w-full bg-white rounded-full mr-2">
                                            <div class="rounded-full bg-primary text-xs leading-none h-2 text-center text-white"
                                                :style="'width: '+ parseInt(step / 3 * 100) +'%'"></div>
                                        </div>
                                        <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 3 * 100) +'%'">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Top Navigation -->

                            <!-- Step Content -->
                            <div class="py-5">
                                <div x-show.transition.in="step === 1">
                                    <div class="mb-5">
                                        <input type="text" id="set-aliases" placeholder="Alias / Nama Asli"
                                            class="aliases font-bold bg-white focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                            name="aliases" value="" required>
                                    </div>

                                    <div class="mb-5 text-center">
                                        <input type="currency" id="set-amount" min="0" step="0.01" placeholder="Nominal"
                                            class="amount font-bold bg-white focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                            name="amount" value="" required>
                                    </div>
                                </div>
                                <div x-show.transition.in="step === 2">
                                    <div class="mb-5">
                                        <label for="password" class="font-bold mb-1 text-gray-700 block">
                                            Pilih Metode Pembayaran
                                        </label>

                                        <div class="select-payment flex flex-col mt-5"> {{-- Looping in Js --}}
                                        </div>
                                    </div>
                                </div>
                                <div x-show.transition.in="step === 3">
                                    <div class="mb-5">
                                        <label for="payment" x-model="payment" class="font-bold mb-1 text-gray-700 block">
                                            Ringkasan
                                        </label>
                                        <div
                                            class="flex flex-col p-3 border-gray-200 border text-xs my-3 bg-gray-50 rounded-xl">
                                            <div class="flex justify-between py-2">
                                                <span class="w-1/2 font-bold">Name </span>
                                                <span class="w-2/3" id="detail-aliases"> </span>
                                            </div>
                                            <div class="flex justify-between py-2 border-t border-gray-200">
                                                <span class="w-1/2 font-bold">Nominal </span>
                                                <span class="w-2/3" id="detail-amount"></span>
                                            </div>
                                            {{-- <div class="flex justify-between py-2 border-t">
                                                    <span class="w-1/2 font-bold">Payment Method </span>
                                                    <span class="w-2/3 " id="detail-payment"> </span>
                                                </div> --}}
                                        </div>
                                        <div class="flex flex-col">
                                            <p class="font-bold mb-1 text-gray-700 block"> Selesaikan Pembayaran : </p>
                                            <div
                                                class="flex flex-col p-3 border-gray-200 border text-xs my-3 bg-gray-50 rounded-xl">
                                                <p class="payment-notes text-sm"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / Step Content -->
                            </div>
                        </div>

                        <!-- Bottom Navigation -->
                        <div class=" bottom-0 left-0 right-0 py-5 px-0" x-show="step != 'complete'">
                            <div class="max-w-3xl mx-auto">
                                <div class="flex justify-between">
                                    <div class="w-1/2">
                                        <button x-show="step > 1" @click="step--"
                                            class="w-32 inline-flex items-center gap-2 py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-bold border">
                                            <i class="fe fe-arrow-left fe-16"></i> Previous
                                        </button>
                                    </div>

                                    <div class="w-1/2 text-right">
                                        <button x-show="step < 3" @click="step++"
                                            class="w-32 inline-flex items-center gap-2 border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-primary hover:bg-primary font-bold">
                                            Next <i class="fe fe-arrow-right fe-16"></i>
                                        </button>

                                        <button @click="step = 'complete'" x-show="step === 3" type="submit"
                                            class="submitForm w-32 inline-flex items-center gap-2 border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-primary hover:bg-primary font-bold">
                                            Complete <i class="fe fe-check fe-16"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / Bottom Navigation -->
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js-pages')
    <script src="{{ asset('js/app-beramal.js') }}"></script>
@endpush
