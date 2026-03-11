@extends('layouts.app')

@section('content')
    <div class="min-h-0 flex-1 bg-slate-50">

        @include('partials.header')

        <div class="mx-auto max-w-7xl px-6 py-8 sm:px-8 lg:px-10">
            <livewire:creators-ticketing.ticket-submit-form />
        </div>

    </div>
@endsection
