@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-slate-50">

        <form method="POST" action="/login" class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
            @csrf

            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

            <div class="mb-4">
                <label class="block text-sm mb-1">Email</label>
                <input type="email" name="email" required class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="mb-6">
                <label class="block text-sm mb-1">Password</label>
                <input type="password" name="password" required class="w-full border rounded-lg px-3 py-2">
            </div>

            <button class="w-full bg-blue-600 text-white py-2 rounded-lg">
                Entrar
            </button>

            <p class="text-sm text-center mt-4">
                Não tens conta?
                <a href="/register" class="text-blue-600">Criar conta</a>
            </p>
        </form>

    </div>
@endsection
