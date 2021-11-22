@extends('layouts.app')

@section('content')
    <section class="py-32 bg-white md:px-0 w-full">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-0 w-full">
            {{ __('Dashboard') }}

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
            </div>

        </div>
    </section>
@endsection
