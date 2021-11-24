@extends('pages.user.profile')

@section('profile-contents')
    <form action="{{ route('profile.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="w-full pb-3 border-b mb-5">
            <h4 class="font-bold tracking-wide text-gray-700">Edit Profile</h4>
        </div>
        <div class="mb-6">
            <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2" for="name">
                My Full Name
            </label>
            <input type="text" id="name" name="name"
                class="font-bold  capitalize shadow-sm bg-gray-100 focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                value="{{ $user->name }}" required>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input type="email" id="email" name="email"
                    class="font-bold  shadow-sm bg-gray-100 focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2" for="phone-number">
                    Phone Number
                </label>
                <input type="text" id="phone-number" name="user_phone"
                    class="font-bold shadow-sm bg-gray-100 focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    value="{{ old('user_phone', $user->user_phone) }}" required>
            </div>
        </div>
        <div class="">
            <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2" for="address">
                Address
            </label>
            <textarea
                class="font-bold capitalize shadow-sm bg-gray-100 focus:bg-white border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                id="address" name="user_address">{{ $user->user_address }}</textarea>
        </div>
        {{-- <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2" for="city">
                    City
                </label>
                <input type="text" id="city"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    placeholder="My City" required>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2" for="countries">
                    Countries
                </label>
                <select id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                    <option>United States</option>
                    <option>Canada</option>
                    <option>France</option>
                    <option>Germany</option>
                </select>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2" for="grid-zip">
                    Zip
                </label>
                <input type="text" id="zip"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                    placeholder="16340" required>
            </div>
        </div> --}}

        @include('components/edit-button')
    </form>
@endsection
