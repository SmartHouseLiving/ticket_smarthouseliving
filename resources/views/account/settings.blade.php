@extends('layouts.app')

@section('title', 'A minha conta')

@section('content')
    <div class="min-h-screen bg-slate-100">
        @include('partials.header')

        <main class="py-8 sm:py-10">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 space-y-6">

                {{-- mensagens --}}
                @if (session('success'))
                    <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-800">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-800">
                        <ul class="space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- header da conta --}}
                <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm text-center">

                    <form id="profile-photo-form" method="POST" action="{{ route('account.photo.update') }}"
                        enctype="multipart/form-data" class="flex flex-col items-center gap-4">

                        @csrf

                        <label for="profile_photo" class="cursor-pointer group relative">

                            @if (auth()->user()->profile_photo)
                                <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}"
                                    class="h-28 w-28 rounded-3xl object-cover shadow-md ring-2 ring-slate-200 transition group-hover:brightness-90">
                            @else
                                <div
                                    class="flex h-28 w-28 items-center justify-center rounded-3xl bg-gradient-to-br from-cyan-400 to-blue-500 text-3xl font-semibold text-slate-900 shadow-md ring-2 ring-slate-200 transition group-hover:brightness-90">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                            @endif

                            <div
                                class="absolute inset-0 flex items-center justify-center rounded-3xl bg-black/40 opacity-0 group-hover:opacity-100 transition">
                                <span class="text-white text-xs font-semibold tracking-wide">
                                    Alterar
                                </span>
                            </div>

                        </label>

                        <input type="file" id="profile_photo" name="profile_photo" accept="image/*" class="hidden"
                            onchange="document.getElementById('profile-photo-form').submit();">

                        <div class="text-center">
                            <h2 class="text-xl font-semibold text-slate-900">
                                {{ auth()->user()->name }}
                            </h2>

                            <p class="text-sm text-slate-500 mt-1">
                                {{ auth()->user()->email }}
                            </p>
                        </div>

                    </form>

                </div>

                {{-- informação da conta --}}
                <div class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-sm">

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-slate-900">
                            Informação da conta
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            Estes dados estão associados ao teu utilizador.
                        </p>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Nome
                            </label>

                            <input type="text" value="{{ auth()->user()->name }}" disabled
                                class="block w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-600 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Email
                            </label>

                            <input type="email" value="{{ auth()->user()->email }}" disabled
                                class="block w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-600 shadow-sm">
                        </div>

                    </div>

                </div>

                {{-- segurança --}}
                <div class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-sm">

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-slate-900">
                            Segurança
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            Atualiza a tua palavra-passe.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('account.password.update') }}" class="space-y-5">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Palavra-passe atual
                            </label>

                            <input type="password" name="current_password"
                                class="block w-full rounded-2xl border border-slate-300 px-4 py-3 shadow-sm focus:border-cyan-500 focus:ring-cyan-500">

                            @error('current_password')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid gap-5 sm:grid-cols-2">

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Nova palavra-passe
                                </label>

                                <input type="password" name="password"
                                    class="block w-full rounded-2xl border border-slate-300 px-4 py-3 shadow-sm focus:border-cyan-500 focus:ring-cyan-500">

                                @error('password')
                                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Confirmar nova palavra-passe
                                </label>

                                <input type="password" name="password_confirmation"
                                    class="block w-full rounded-2xl border border-slate-300 px-4 py-3 shadow-sm focus:border-cyan-500 focus:ring-cyan-500">
                            </div>

                        </div>

                        <div class="flex items-center gap-3 pt-2">

                            <button type="submit"
                                class="inline-flex items-center rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:shadow-md transition">
                                Atualizar palavra-passe
                            </button>

                            <a href="{{ route('tickets.front') }}"
                                class="inline-flex items-center rounded-2xl border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50 hover:border-slate-400">
                                Voltar ao início
                            </a>

                        </div>

                    </form>

                </div>

            </div>
        </main>
    </div>
@endsection
