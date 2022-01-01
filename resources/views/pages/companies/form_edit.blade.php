@extends('pages.user.profile')

@section('profile-contents')
    <div class="flex flex-col gap-4 w-full sm:pt-0 pt-6">
        <p class="text-primary sm:text-xl font-bold">
            Tentang Perusahaan / Aplikasi
        </p>
        <div class="md:h-auto flex-grow bg-white mt-5 md:mt-0 p-6 shadow-sm border border-gray-200 rounded-lg">

            @if ($errors->any())
                <div id="alert-2" class="flex gap-3 bg-red-100 rounded-lg p-4 mb-4 items-center text-red-700" role="alert">
                    @foreach ($errors->all() as $error)
                        <i class="font-medium fe fe-alert-circle fe-12"></i>
                        <div class="ml-3 text-sm font-medium text-red-700">
                            {{ $error }}
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
                    @endforeach
                </div>
            @endif

            <form action="{{ route('companies.update', $comp->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="w-full pb-3 border-b mb-5">
                    <h4 class="font-bold tracking-wide text-gray-700">Ubah Tentang</h4>
                </div>
                <div class="mb-6">
                    <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2" for="name">
                        Perusahaan / Nama Aplikasi
                    </label>
                    <input type="text" id="name" name="comp_name"
                        class="font-bold capitalize border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                        value="{{ $comp->comp_name }}">
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input type="email" id="email" name="comp_email"
                            class="font-bold  border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                            value="{{ old('comp_email', $comp->comp_email) }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2"
                            for="phone-number">
                            No. Telepon
                        </label>
                        <input type="text" id="phone-number" name="comp_phone"
                            class="font-bold border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                            value="{{ old('comp_phone', $comp->comp_phone) }}">
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2" for="address">
                        Alamat
                    </label>
                    <textarea
                        class="font-bold capitalize border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                        id="address" name="comp_address">{{ $comp->comp_address }}</textarea>
                </div>

                <div class="">
                    <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2" for="about">
                        Informasi Tentang
                    </label>
                    <textarea
                        class="font-bold capitalize border border-gray-300 text-gray-600 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                        id="tinymce" name="comp_about">{{ $comp->comp_about }}</textarea>
                </div>

                @include('components/edit-button')
            </form>
        </div>
    </div>
@endsection
