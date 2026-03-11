@extends('layouts.app')

@section('title', 'Criar conta')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-slate-50">

        <form method="POST" action="/register" class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
            @csrf

            <h2 class="text-2xl font-bold mb-6 text-center">Criar conta</h2>

            <div class="mb-4">
                <label>Nome</label>
                <input type="text" name="name" required class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="mb-4">
                <label>Email</label>
                <input type="email" name="email" required class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="mb-4">
                <label>Password</label>
                <input type="password" name="password" required class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="mb-6">
                <label>Confirmar Password</label>
                <input type="password" name="password_confirmation" required class="w-full border rounded-lg px-3 py-2">
            </div>

            <button class="w-full bg-blue-600 text-white py-2 rounded-lg">
                Criar conta
            </button>

            <p class="text-sm text-center mt-4">
                Já tens conta?
                <a href="/login" class="text-blue-600">Entrar</a>
            </p>

        </form>

    </div>
@endsection
