@extends('layouts.app')

@section('content')
    <div class="min-h-0 flex-1">

        @include('partials.header')

        <livewire:creators-ticketing.ticket-submit-form />
    </div>
@endsection
