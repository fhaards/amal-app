@extends('layouts.app')

@section('content')
    <div class="h-full md:px-0 w-full -mt-50">
        <div class="container items-center max-w-6xl mx-auto xl:px-0 w-full px-4">
            <div class="air-slider">
                <div class="slide h-screen">
                    <div class="flex flex-wrap items-center sm:-mx-3 py-24">
                        <div class="w-full md:w-1/2 md:px-3">
                            <div
                                class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
                                <h1
                                    class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                                    <span class="block xl:inline">Setiap tindakan kebaikan</span>
                                    <span class="block text-primary xl:inline">adalah amal</span>
                                </h1>
                                <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">Kekayaan
                                    sejati
                                    seseorang adalah kebaikan yang dilakukannya di dunia ini.</p>
                                <div class="relative flex flex-col sm:flex-row sm:space-x-4">
                                    <a href="{{ route('beramal') }}"
                                        class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-primary sm:mb-0 hover:bg-primary sm:w-auto rounded-3xl">
                                        Mulai Beramal
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2">
                            <div class="sm:w-full sm:h-auto hidden sm:flex overflow-hidden">
                                <svg version="1.1" id="logo" class="h-96 mt-2" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" height="100%" width="100%">
                                    <image href="{{ asset('img/app-img/heroimg.svg') }}" height="100%" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($table->isEmpty())
                @else
                    @foreach ($table as $item)
                        <div class="slide">
                            <div class="flex flex-wrap items-center sm:-mx-3 py-24">
                                <div class="w-full md:w-1/2 px-4">
                                    <div class="sm:w-full sm:h-auto sm:flex overflow-hidden">
                                        <img src="{{ asset("storage/slider/$item->gambar") }}"
                                            class="img-fluid rounded-3xl" />
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 sm:pl-24 sm:pr-4 pr-4 pl-4 mt-24 sm:mt-0 text-right">
                                    <div
                                        class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
                                        <h1
                                            class="text-xl font-extrabold tracking-tight text-gray-900 sm:text-2xl md:text-2xl lg:text-2xl xl:text-2xl">
                                            {{ $item->title }}
                                        </h1>
                                        <p class=" mx-auto text-base text-gray-500 sm:max-w-md lg:text-lg md:max-w-3xl">
                                            {{ $item->subtitle }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>

    {{-- <section class="h-screen bg-white md:px-0 w-full">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-0 w-full">
            <div class="flex flex-wrap items-center sm:-mx-3 py-32">
                <div class="w-full md:w-1/2 md:px-3">
                    <div
                        class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
                        <h1
                            class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                            <span class="block xl:inline">Setiap tindakan kebaikan</span>
                            <span class="block text-primary xl:inline">adalah amal</span>
                        </h1>
                        <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">Kekayaan sejati
                            seseorang adalah kebaikan yang dilakukannya di dunia ini.</p>
                        <div class="relative flex flex-col sm:flex-row sm:space-x-4">
                            <a href="{{ route('beramal') }}"
                                class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-primary sm:mb-0 hover:bg-primary sm:w-auto rounded-3xl">
                                Mulai Beramal
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="sm:w-full sm:h-auto hidden sm:flex overflow-hidden">
                        <svg version="1.1" id="logo" class="h-96 mt-2" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" height="100%" width="100%">
                            <image href="{{ asset('img/app-img/heroimg.svg') }}" height="100%" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection

@push('js-pages')
    <script src="{{ asset('vendor/air-slider/air-slider.min.js') }}"></script>
    <script>
        var slider = new airSlider({
            autoPlay: true,
            autoPlayTime: 5000,
            width: '100%',
            height: '700px'
        });
    </script>
@endpush
