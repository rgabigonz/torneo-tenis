@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 460px; margin: 40px auto;">
        <h1 style="margin-top: 0;">Ingreso al sistema</h1>
        <p>Ingres? con tu usuario para acceder al torneo.</p>

        @if ($errors->any())
            <div class="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Contrase?a</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="remember" value="1">
                    Recordarme
                </label>
            </div>

            <button type="submit" class="btn">Ingresar</button>
        </form>
    </div>
@endsection