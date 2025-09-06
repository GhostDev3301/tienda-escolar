@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-xl shadow-md p-6">
    <h1 class="text-2xl font-bold mb-4 text-center">Iniciar Sesión</h1>

    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-600 rounded">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium">Correo</label>
            <input type="email" name="email" required class="w-full border rounded-lg p-2">
        </div>
        <div>
            <label class="block text-sm font-medium">Contraseña</label>
            <input type="password" name="password" required class="w-full border rounded-lg p-2">
        </div>
        <div class="flex items-center justify-between">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="remember">
                <span class="text-sm">Recordarme</span>
            </label>
            <a href="{{ route('password.request') }}" class="text-sm text-primary hover:underline">¿Olvidaste tu contraseña?</a>
        </div>
        <button type="submit" class="w-full bg-primary text-white rounded-lg py-2">Entrar</button>
    </form>

    <p class="mt-4 text-center text-sm">¿No tienes cuenta?
        <a href="{{ route('register') }}" class="text-primary hover:underline">Regístrate</a>
    </p>
</div>
@endsection
