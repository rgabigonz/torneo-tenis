@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 700px;">
        <h1 style="margin-top: 0;">Editar temporada</h1>

        <form method="POST" action="{{ route('admin.seasons.update', $season) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $season->name) }}"
                    required
                    style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px;"
                >
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="year">Año</label>
                <input
                    type="number"
                    id="year"
                    name="year"
                    value="{{ old('year', $season->year) }}"
                    min="2000"
                    max="2100"
                    required
                    style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px;"
                >
                @error('year')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="start_date">Fecha de inicio</label>
                <input
                    type="date"
                    id="start_date"
                    name="start_date"
                    value="{{ old('start_date', $season->start_date?->format('Y-m-d')) }}"
                    required
                    style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px;"
                >
                @error('start_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="end_date">Fecha de fin</label>
                <input
                    type="date"
                    id="end_date"
                    name="end_date"
                    value="{{ old('end_date', $season->end_date?->format('Y-m-d')) }}"
                    required
                    style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px;"
                >
                @error('end_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="active" value="1" {{ old('active', $season->active) ? 'checked' : '' }}>
                    Activa
                </label>
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn">Actualizar</button>
                <a href="{{ route('admin.seasons.index') }}" class="btn" style="background: #6b7280;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection