@extends('pages.user.profile')

@section('profile-contents')
    <div class="md:h-auto flex-grow bg-white mt-5 md:mt-0 p-6 shadow-sm border border-gray-200 rounded-lg">
        <form action="{{ route('profile-change-photo', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="w-full pb-3 border-b mb-5">
                <h4 class="font-bold tracking-wide text-gray-700">Change Photo Profile</h4>
            </div>
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

            <div class="mb-6">
                <label class="block capitalize tracking-wide text-gray-500 text-sm font-bold mb-2" for="photo">
                    Upload Photo
                </label>
                <input
                    class="block w-full cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:border-transparent text-sm rounded-lg
                @error('file') is-invalid @enderror"
                    aria-describedby="user_avatar_help" id="user_avatar" name="file" type="file">
                <div class="mt-1 text-sm text-gray-500" id="user_avatar_help">
                    A profile picture is useful to confirm your are
                    logged into your account
                </div>
            </div>

            @include('components/edit-button')
        </form>
    </div>
@endsection
