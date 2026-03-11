@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-slate-50 px-4">

        <div class="w-full max-w-md">

            {{-- Branding --}}
            <div class="mb-10 flex items-center justify-center gap-5">

                <img src="{{ $header?->logo ? asset('storage/' . $header->logo) : asset('images/logo.png') }}"
                    alt="{{ $header?->company_name ?? 'SmartHouseLiving' }}" class="h-16 w-auto object-contain">

                <div class="text-left">
                    <p class="text-sm font-semibold uppercase tracking-[0.32em] text-cyan-600/80">
                        {{ $header?->header_badge ?? 'Automation Support Portal' }}
                    </p>

                    <h1 class="text-xl font-semibold tracking-tight text-slate-900 sm:text-2xl">
                        {{ $header?->header_title ?? 'Centro de Suporte Técnico' }}
                    </h1>
                </div>

            </div>

            <form method="POST" action="/login" class="w-full rounded-2xl bg-white p-8 shadow-md">

                @csrf

                <h2 class="mb-6 text-center text-2xl font-bold text-slate-900">
                    Entrar
                </h2>

                @if ($errors->any())
                    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="mb-4">
                    <label class="mb-1 block text-sm font-medium text-slate-700">
                        Email
                    </label>

                    <input type="email" name="email" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500">
                </div>

                <div class="mb-6">
                    <label class="mb-1 block text-sm font-medium text-slate-700">
                        Password
                    </label>

                    <input type="password" name="password" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500">
                </div>

                <button
                    class="w-full rounded-lg bg-gradient-to-r from-cyan-500 to-blue-600 py-2 font-semibold text-white transition hover:shadow-md">
                    Entrar
                </button>

                <p class="mt-4 text-center text-sm text-slate-600">
                    Não tens conta?
                    <a href="/register" class="text-cyan-600 hover:underline">
                        Criar conta
                    </a>
                </p>

            </form>

        </div>

    </div>
@endsection
