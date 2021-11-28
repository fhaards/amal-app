@extends('pages.user.profile')

@section('profile-contents')
    <div class="h-32 flex-grow bg-white mt-5 md:mt-0 p-6 shadow-sm border border-gray-200 rounded-lg bg-gradient-to-r from-white to-green-100">
        <p class="text-green-400 text-lg font-bold">
            Hello,
        </p>
        <div class="text-gray-800 text-3xl font-bold">
            {{ $user->name }}
        </div>
    </div>
@endsection
