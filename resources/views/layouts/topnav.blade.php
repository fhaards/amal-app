<nav class="w-full px-8 text-gray-700 bg-white">
    <div
        class="container mx-auto flex flex-wrap items-center justify-between py-5 px-2 xl:px-0 mx-auto md:flex-row max-w-6xl">

        <div class="flex md:order-2">
            <a href="#" class="flex md:w-full w-40">
                <svg version="1.1" id="logo" class="h-10" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" height="50">
                    <image href="{{ asset('img/app-img/logo.svg') }}" height="40" />
                </svg>
            </a>
            <div class="relative mr-3 md:mr-0 hidden md:block">
                {{-- search --}}
            </div>
            <button data-collapse-toggle="mobile-menu-3" type="button"
                class="md:hidden text-gray-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300 rounded-lg inline-flex items-center justify-between"
                aria-controls="mobile-menu-3" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="hidden md:flex justify-between items-center w-full md:w-auto md:order-2" id="mobile-menu-3">
            <ul class="flex-col md:flex-row flex md:space-x-8 mt-4 md:mt-0 md:text-sm md:font-medium">
                <li>
                    <a href="#"
                        class="font-medium leading-6 bg-green-400 md:bg-transparent text-white block pl-3 pr-4 py-2 md:text-green-400 md:p-0 rounded"
                        aria-current="page">
                        Home
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="font-medium leading-6 text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-green-400 md:p-0">
                        About
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="font-medium leading-6 text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-green-400 md:p-0">
                        Services
                    </a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li>
                            <a class="font-medium leading-6 text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-green-400 md:p-0"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li>
                            <a class="font-medium leading-6 text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-green-400 md:p-0"
                                href="{{ route('register') }}">
                                <i class="fe fe-log-in fe-12"></i>
                                <span class="pl-2">{{ __('Register') }}</span></a>
                        </li>
                    @endif

                @else
                    <li>
                        <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                            class="spacer-6 font-medium leading-6 capitalize text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 inline-flex md:hover:text-green-400 md:p-0 focus:text-green-400"
                            type="button">
                            <i class="fe fe-user fe-16"></i>
                            <span class="pl-2">{{ Auth::user()->name }}</span>
                        </button>

                        <!-- Dropdown menu -->
                        <ul id="dropdownDivider"
                            class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow w-44">
                            <ul class="py-1" aria-labelledby="dropdownDividerButton">
                                <li>
                                    <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Profile</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Settings</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a class="font-medium leading-6 text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fe fe-log-out fe-16 pr-2"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </ul>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>

{{-- <section class="w-full px-8 text-gray-700 bg-white">
    <div
        class="container flex flex-col flex-wrap items-center justify-between py-5 px-8 xl:px-0 mx-auto md:flex-row max-w-6xl">
        <div class="relative flex flex-col md:flex-row">
            <a href="#_"
                class="flex items-center mb-5 font-medium text-gray-900 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                <span class="mx-auto text-xl font-black leading-none text-gray-900 select-none">tails<span
                        class="text-green-400">.</span></span>
            </a>
            <nav
                class="flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200">
                <a href="#_" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Home</a>
                <a href="#_" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Amal</a>
                <a href="#_" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">About</a>
                <a href="#_" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Contact</a>
            </nav>
        </div>

        <div class="inline-flex items-center ml-5 space-x-6">

        </div>
    </div>
</section> --}}
