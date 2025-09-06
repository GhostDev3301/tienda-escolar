@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-xl shadow-md p-6">
    <h1 class="text-2xl font-bold mb-4 text-center">Crear Cuenta</h1>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium">Nombre</label>
            <input type="text" name="name" required class="w-full border rounded-lg p-2">
        </div>
        <div>
            <label class="block text-sm font-medium">Correo</label>
            <input type="email" name="email" required class="w-full border rounded-lg p-2">
        </div>
        <div>
            <label class="block text-sm font-medium">Contraseña</label>
            <input type="password" name="password" required class="w-full border rounded-lg p-2">
        </div>
        <div>
            <label class="block text-sm font-medium">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" required class="w-full border rounded-lg p-2">
        </div>
        <button type="submit" class="w-full bg-primary text-white rounded-lg py-2">Registrarme</button>
    </form>

    <p class="mt-4 text-center text-sm">¿Ya tienes cuenta?
        <a href="{{ route('login') }}" class="text-primary hover:underline">Inicia sesión</a>
    </p>
</div>
@endsection
