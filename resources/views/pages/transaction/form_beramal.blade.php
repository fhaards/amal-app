@extends('layouts.app')

@section('content')
    <section class="md:mt-0 mt-5 w-full px-8 py-24 bg-green-50 xl:px-8 justify-items-center items-center flex">
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

                <div class="w-full mt-5 md:mt-0 md:w-2/5 bg-white rounded-xl shadow-xl">
                    {{-- <form method="POST" action="{{route('beramal-insert')}}" id="#form-beramal">
                        <div
                            class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 shadow-2xl px-7 rounded-xl">
                            <h3 class="mb-6 text-2xl font-medium text-center">Mulai Beramal</h3>
                            @csrf
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
                    </form> --}}
                    {{-- <form method="POST" action="{{ route('beramal-insert') }}" id="#form-beramal"> --}}
                    <div x-data="app()" x-cloak>
                        <div class="max-w-3xl mx-auto p-10" id="form-beramal">
                            @csrf;
                            <input type="hidden" class="user_id" name="user_id" value="{{ $user->id }}">
                            <div x-show.transition="step === 'complete'">
                                <div class="p-10 flex items-center justify-between">
                                    <div>
                                        <svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20"
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
                                            class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">Back
                                            to home</button>
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
                                                    Personal
                                                </div>
                                            </div>

                                            <div x-show="step === 2">
                                                <div class="text-lg font-bold text-gray-700 leading-tight">
                                                    Payment
                                                </div>
                                            </div>

                                            <div x-show="step === 3">
                                                <div class="text-lg font-bold text-gray-700 leading-tight">
                                                    Details
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center md:w-64">
                                            <div class="w-full bg-white rounded-full mr-2">
                                                <div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white"
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
                                                class="aliases font-bold bg-white focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                                name="aliases" value="" required>
                                        </div>

                                        <div class="mb-5 text-center">
                                            <input type="currency" id="set-amount" min="0" step="0.01" placeholder="Nominal"
                                                class="amount font-bold bg-white focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                                name="amount" value="" required>
                                        </div>
                                    </div>
                                    <div x-show.transition.in="step === 2">
                                        <div class="mb-5">
                                            <label for="password" class="font-bold mb-1 text-gray-700 block">
                                                Select Payment Method
                                            </label>

                                            <div class="select-payment flex flex-col mt-5">
                                                {{-- Looping in Js --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div x-show.transition.in="step === 3">
                                        <div class="mb-5">
                                            <label for="payment" x-model="payment"
                                                class="font-bold mb-1 text-gray-700 block">
                                                Summary
                                            </label>
                                            <div
                                                class="flex flex-col p-3 border-gray-200 border text-xs my-3 bg-gray-50 rounded-xl">
                                                <div class="flex justify-between py-2">
                                                    <span class="w-1/2 font-bold">Name </span>
                                                    <span class="w-2/3" id="detail-aliases"> </span>
                                                </div>
                                                <div class="flex justify-between py-2 border-t border-gray-200">
                                                    <span class="w-1/2 font-bold">Amount </span>
                                                    <span class="w-2/3" id="detail-amount"></span>
                                                </div>
                                                {{-- <div class="flex justify-between py-2 border-t">
                                                    <span class="w-1/2 font-bold">Payment Method </span>
                                                    <span class="w-2/3 " id="detail-payment"> </span>
                                                </div> --}}
                                            </div>
                                            <div class="flex flex-col">
                                                <p class="font-bold mb-1 text-gray-700 block"> Complete payment : </p>
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
                                                class="w-32 inline-flex items-center gap-2 border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-green-400 hover:bg-green-500 font-bold">
                                                Next <i class="fe fe-arrow-right fe-16"></i>
                                            </button>

                                            <button @click="step = 'complete'" x-show="step === 3" type="submit"
                                                class="submitForm w-32 inline-flex items-center gap-2 border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-green-400 hover:bg-green-500 font-bold">
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
