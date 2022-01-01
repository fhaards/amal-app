<nav class="w-full md:px-6 text-gray-700 z-10 fixed sm:relative h-16 transition-all duration-150 sm:h-24">
    <div class="container mx-auto w-100 px-3 pt-3 sm:pt-0">
        <div
            class="w-full px-2 py-1  left:0 bg-white rounded-lg shadow-lg flex flex-wrap items-center justify-between 
               md:max-w-6xl md:py-3 md:px-0 md:mx-auto md:flex-row md:relative md:rounded-none md:shadow-none z-10">

            <div class="flex md:order-2">
                <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="w-xl button items-center md:hidden text-gray-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-300 rounded-lg justify-between"
                    aria-controls="mobile-menu-3" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-10 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>

                <a href="{{ route('homepages') }}" class="ml-2 md:ml-0 flex md:w-full w-full items-center gap-3 py-2 rounded-xl sm:px-0">
                    <img src="{{ asset('img/app-img/logo.png') }}" class="img-responsive h-6 sm:h-12" />
                    <span class="font-black text-gray-800 tracking-widest sm:text-md text-sm">MASJID JAMI NURUL IHSAN</span>
                </a>
                <div class="relative mr-3 md:mr-0 hidden md:block">
                    {{-- search --}}
                </div>
            </div>

            <div class="w-full hidden md:flex justify-between items-center w-100 md:w-auto md:order-2"
                id="mobile-menu-2">
                <ul class="flex flex-col md:flex-row md:space-x-8 mt-4 md:mt-0 md:text-sm md:font-bold">
                    <li>
                        <a href="{{ route('homepages') }}"
                            class="text-base font-bold leading-6 text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block  pl-3 pr-4 py-2 md:hover:text-primary md:p-0"
                            aria-current="page">
                            Beranda
                        </a>
                    </li>
                    {{-- <li>
                        <a href="#"
                            class="text-base font-bold leading-6 text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-primary md:p-0">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-base font-bold leading-6 text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-primary md:p-0">
                            Services
                        </a>
                    </li> --}}
                    @guest
                        @if (Route::has('login'))
                            <li>
                                <a class="text-base font-bold leading-6 text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-primary md:p-0"
                                    href="{{ route('login') }}">Masuk</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li>
                                <a class="text-base font-bold leading-6 text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-primary md:p-0"
                                    href="{{ route('register') }}">
                                    <span class="pl-2">Registrasi</span></a>
                            </li>
                        @endif

                    @else
                        @if (Auth::user()->user_group == 'user')
                            <li class="">
                                <a class="text-base font-bold leading-6 text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-primary md:p-0"
                                    href="{{ route('beramal') }}">
                                    Beramal
                                </a>
                            </li>
                        @endif

                        <li class="w-full">
                            <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                                class="md:w-auto w-full items-center spacer-6 text-base font-bold leading-6 capitalize text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 inline-flex md:hover:text-primary md:p-0 focus:text-primary"
                                type="button">
                                <i class="fe fe-user fe-12 font-black"></i>
                                <span class="pl-2">{{ Auth::user()->name }}</span>
                            </button>

                            <!-- Dropdown menu -->
                            <ul id="dropdownDivider" class="hidden text-base z-10 list-none divide-y divide-gray-100">
                                <ul class="bg-white sm:w-44 px-5 md:px-0 rounded shadow"
                                    aria-labelledby="dropdownDividerButton">
                                    <li>
                                        <a href="{{ route('profile.index') }}"
                                            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Profil</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Pengaturan</a>
                                    </li>

                                    <li class="py-1">
                                        <a class="font-bold leading-6 text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fe fe-log-out fe-16 pr-2"></i>
                                            Keluar
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </ul>
                        </li>
                    @endguest

                </ul>
            </div>


        </div>
    </div>
</nav>