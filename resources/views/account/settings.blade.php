@extends('layouts.app')

@section('title', 'A minha conta')

@section('content')
    <div class="min-h-screen bg-slate-100">
        @include('partials.header')

        <main class="py-10 sm:py-12">
            <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-6 lg:grid-cols-[320px_minmax(0,1fr)]">
                    {{-- Sidebar / resumo --}}
                    <aside class="space-y-6">
                        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                            <div class="h-24 bg-gradient-to-r from-cyan-500 to-blue-600"></div>

                            <div class="px-6 pb-6">
                                <div
                                    class="-mt-10 flex h-20 w-20 items-center justify-center rounded-2xl border-4 border-white bg-gradient-to-br from-cyan-400 to-blue-500 text-2xl font-semibold text-slate-950 shadow-sm">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>

                                <div class="mt-4">
                                    <h1 class="text-xl font-semibold tracking-tight text-slate-900">
                                        {{ auth()->user()->name }}
                                    </h1>
                                    <p class="mt-1 text-sm text-slate-500">
                                        {{ auth()->user()->email }}
                                    </p>
                                </div>

                                <div class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-4">
                                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">
                                        Conta
                                    </p>
                                    <p class="mt-2 text-sm leading-6 text-slate-600">
                                        Aqui podes consultar os teus dados e atualizar a tua palavra-passe com segurança.
                                    </p>
                                </div>

                                <div class="mt-6">
                                    <a href="{{ route('tickets.front') }}"
                                        class="inline-flex items-center rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:border-cyan-300 hover:bg-cyan-50 hover:text-slate-900">
                                        ← Voltar ao suporte
                                    </a>
                                </div>
                            </div>
                        </div>
                    </aside>

                    {{-- Conteúdo principal --}}
                    <section class="space-y-6">
                        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.20em] text-cyan-600/80">
                                        Área pessoal
                                    </p>
                                    <h2 class="mt-2 text-2xl font-semibold tracking-tight text-slate-900">
                                        A minha conta
                                    </h2>
                                    <p class="mt-2 text-sm text-slate-600">
                                        Gere os teus dados de acesso e mantém a tua conta protegida.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                            <div class="mb-6 flex items-center justify-between gap-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-900">
                                        Informação da conta
                                    </h3>
                                    <p class="mt-1 text-sm text-slate-500">
                                        Estes dados estão associados ao teu utilizador.
                                    </p>
                                </div>
                            </div>

                            <div class="grid gap-5 sm:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-sm font-medium text-slate-700">Nome</label>
                                    <input type="text" value="{{ auth()->user()->name }}" disabled
                                        class="block w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-600 shadow-sm">
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-medium text-slate-700">Email</label>
                                    <input type="email" value="{{ auth()->user()->email }}" disabled
                                        class="block w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-600 shadow-sm">
                                </div>
                            </div>
                        </div>

                        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-slate-900">Segurança</h3>
                                <p class="mt-1 text-sm text-slate-500">
                                    Atualiza a tua palavra-passe para manteres a conta segura.
                                </p>
                            </div>

                            <form method="POST" action="{{ route('account.password.update') }}" class="space-y-5">
                                @csrf

                                <div>
                                    <label for="current_password" class="mb-2 block text-sm font-medium text-slate-700">
                                        Palavra-passe atual
                                    </label>
                                    <input id="current_password" name="current_password" type="password"
                                        class="block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 shadow-sm transition focus:border-cyan-500 focus:ring-cyan-500">
                                    @error('current_password')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid gap-5 sm:grid-cols-2">
                                    <div>
                                        <label for="password" class="mb-2 block text-sm font-medium text-slate-700">
                                            Nova palavra-passe
                                        </label>
                                        <input id="password" name="password" type="password"
                                            class="block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 shadow-sm transition focus:border-cyan-500 focus:ring-cyan-500">
                                        @error('password')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="password_confirmation"
                                            class="mb-2 block text-sm font-medium text-slate-700">
                                            Confirmar nova palavra-passe
                                        </label>
                                        <input id="password_confirmation" name="password_confirmation" type="password"
                                            class="block w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 shadow-sm transition focus:border-cyan-500 focus:ring-cyan-500">
                                    </div>
                                </div>

                                <div class="pt-2">
                                    <button type="submit"
                                        class="inline-flex items-center rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:scale-[1.01] hover:shadow-md">
                                        Atualizar palavra-passe
                                    </button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>
@endsection
