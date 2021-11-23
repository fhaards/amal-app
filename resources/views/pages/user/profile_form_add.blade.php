@extends('pages.user.profile')

@section('profile-contents')
    <form>
        <div class="mb-6">
            <label class="block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                My Full Name
            </label>
            <input type="text" id="name"
                class="capitalize shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                value="{{ Auth::user()->name }}" required>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                    Email
                </label>
                <input type="email" id="email"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    value="{{ Auth::user()->email }}" required>
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label for="phone-number" class="text-sm font-medium text-gray-900 block mb-2">Phone Number</label>
                <input type="text" id="phone-number" value="+62 "
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    required>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2" for="city">
                    City
                </label>
                <input type="text" id="city"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    placeholder="My City" required>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2" for="countries">
                    Countries
                </label>
                <select id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                    <option>United States</option>
                    <option>Canada</option>
                    <option>France</option>
                    <option>Germany</option>
                </select>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                    Zip
                </label>
                <input type="text" id="zip"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    placeholder="16340" required>
            </div>
        </div>
        <div class="">
            <label class="block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2" for="address">
                Address
            </label>
            <textarea id="address"
                class="capitalize shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                required>
            </textarea>
        </div>
        @include('components/save-button')
    </form>
@endsection
