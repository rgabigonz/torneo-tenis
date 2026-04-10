@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 700px;">
        <h1 style="margin-top: 0;">Editar categoría</h1>

        <form method="POST" action="{{ route('admin.categories.update', $category) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $category->name) }}"
                    required
                    style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px;"
                >
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="sort_order">Orden</label>
                <input
                    type="number"
                    id="sort_order"
                    name="sort_order"
                    value="{{ old('sort_order', $category->sort_order) }}"
                    min="1"
                    required
                    style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px;"
                >
                @error('sort_order')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="active" value="1" {{ old('active', $category->active) ? 'checked' : '' }}>
                    Activa
                </label>
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn">Actualizar</button>
                <a href="{{ route('admin.categories.index') }}" class="btn" style="background: #6b7280;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection