@extends('layouts.app')

@section('title', 'Criar conta')

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

            <form method="POST" action="/register" enctype="multipart/form-data"
                class="w-full rounded-2xl bg-white p-8 shadow-md" x-data="{
                    preview: '{{ asset('storage/profile-photos/Unknown_person.jpg') }}',
                    updatePreview(event) {
                        const file = event.target.files[0];
                        if (!file) return;
                        this.preview = URL.createObjectURL(file);
                    }
                }">

                @csrf

                <h2 class="mb-6 text-center text-2xl font-bold text-slate-900">
                    Criar conta
                </h2>

                {{-- Foto de perfil --}}
                <div class="mb-6 text-center">
                    <label class="mb-3 block text-sm font-medium text-slate-700">
                        Foto de perfil
                    </label>

                    <label for="profile_photo" class="inline-block cursor-pointer">
                        <img :src="preview"
                            class="mx-auto h-24 w-24 rounded-full object-cover ring-4 ring-slate-100 shadow-sm transition hover:opacity-90">
                    </label>

                    <input id="profile_photo" type="file" name="profile_photo" accept="image/*" class="hidden"
                        @change="updatePreview">

                    <p class="mt-3 text-xs text-slate-500">
                        Clica na imagem para escolher uma foto
                    </p>
                </div>

                <div class="mb-4">
                    <label class="mb-1 block text-sm font-medium text-slate-700">Nome</label>
                    <input type="text" name="name" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500">
                </div>

                <div class="mb-4">
                    <label class="mb-1 block text-sm font-medium text-slate-700">Email</label>
                    <input type="email" name="email" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500">
                </div>

                <div class="mb-4">
                    <label class="mb-1 block text-sm font-medium text-slate-700">Password</label>
                    <input type="password" name="password" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500">
                </div>

                <div class="mb-6">
                    <label class="mb-1 block text-sm font-medium text-slate-700">Confirmar Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500">
                </div>

                <button
                    class="w-full rounded-lg bg-gradient-to-r from-cyan-500 to-blue-600 py-2 font-semibold text-white transition hover:shadow-md">
                    Criar conta
                </button>

                <p class="mt-4 text-center text-sm text-slate-600">
                    Já tens conta?
                    <a href="/login" class="text-cyan-600 hover:underline">Entrar</a>
                </p>

            </form>

        </div>

    </div>
@endsection
