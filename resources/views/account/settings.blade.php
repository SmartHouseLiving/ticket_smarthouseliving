@extends('layouts.app')

@section('title', 'A minha conta')

@section('content')
    <main class="min-h-screen bg-slate-100 py-10">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold tracking-tight text-slate-900">
                    A minha conta
                </h1>
                <p class="mt-2 text-sm text-slate-600">
                    Aqui podes gerir os dados da tua conta e alterar a palavra-passe.
                </p>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-slate-900">Informação da conta</h2>
                    <div class="mt-4 space-y-3">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-700">Nome</label>
                            <input type="text" value="{{ auth()->user()->name }}" disabled
                                class="block w-full rounded-xl border-slate-300 bg-slate-50 text-slate-600 shadow-sm">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-700">Email</label>
                            <input type="email" value="{{ auth()->user()->email }}" disabled
                                class="block w-full rounded-xl border-slate-300 bg-slate-50 text-slate-600 shadow-sm">
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-200 pt-6">
                    <h2 class="text-lg font-semibold text-slate-900">Segurança</h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Atualiza a tua palavra-passe.
                    </p>

                    <form method="POST" action="{{ route('account.password.update') }}" class="mt-5 space-y-4">
                        @csrf

                        <div>
                            <label for="current_password" class="mb-1 block text-sm font-medium text-slate-700">
                                Palavra-passe atual
                            </label>
                            <input id="current_password" name="current_password" type="password"
                                class="block w-full rounded-xl border-slate-300 shadow-sm focus:border-slate-400 focus:ring-slate-400">
                            @error('current_password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="mb-1 block text-sm font-medium text-slate-700">
                                Nova palavra-passe
                            </label>
                            <input id="password" name="password" type="password"
                                class="block w-full rounded-xl border-slate-300 shadow-sm focus:border-slate-400 focus:ring-slate-400">
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="mb-1 block text-sm font-medium text-slate-700">
                                Confirmar nova palavra-passe
                            </label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                class="block w-full rounded-xl border-slate-300 shadow-sm focus:border-slate-400 focus:ring-slate-400">
                        </div>

                        <div class="pt-2">
                            <button type="submit"
                                class="inline-flex items-center rounded-xl bg-slate-900 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-slate-800">
                                Atualizar palavra-passe
                            </button>
                        </div>
                    </form>
                </div>

                <div class="mt-6 border-t border-slate-200 pt-6">
                    <a href="{{ route('tickets.front') }}"
                        class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-slate-900">
                        ← Voltar ao suporte
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
