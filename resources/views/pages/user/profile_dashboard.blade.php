@extends('pages.user.profile')

@section('profile-contents')
    <div class="sm:h-32 flex-grow bg-white my-5 md:my-0 py-6 px-6 shadow-sm border border-gray-200 rounded-lg bg-gradient-to-r from-white to-green-100">
        <p class="text-green-400 text-lg font-bold">
            Hello,
        </p>
        <div class="text-gray-800 sm:text-3xl font-bold">
            {{ $user->name }}
        </div>
    </div>
@endsection
