@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 800px;">
        <h1 style="margin-top: 0;">Editar jugador</h1>

        <form method="POST" action="{{ route('admin.players.update', $player) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="user_id">Usuario vinculado</label>
                <select
                    id="user_id"
                    name="user_id"
                    style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px;"
                >
                    <option value="">-- Sin vincular por ahora --</option>
                    @foreach ($availableUsers as $user)
                        <option value="{{ $user->id }}" {{ old('user_id', $player->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} - {{ $user->email }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="first_name">Nombre</label>
                <input
                    type="text"
                    id="first_name"
                    name="first_name"
                    value="{{ old('first_name', $player->first_name) }}"
                    required
                    style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px;"
                >
                @error('first_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_name">Apellido</label>
                <input
                    type="text"
                    id="last_name"
                    name="last_name"
                    value="{{ old('last_name', $player->last_name) }}"
                    required
                    style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px;"
                >
                @error('last_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email del jugador</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $player->email) }}"
                    style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px;"
                >
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input
                    type="text"
                    id="phone"
                    name="phone"
                    value="{{ old('phone', $player->phone) }}"
                    style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px;"
                >
                @error('phone')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="club_member_number">Número de socio</label>
                <input
                    type="text"
                    id="club_member_number"
                    name="club_member_number"
                    value="{{ old('club_member_number', $player->club_member_number) }}"
                    style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px;"
                >
                @error('club_member_number')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Estado</label>
                <select
                    id="status"
                    name="status"
                    required
                    style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px;"
                >
                    <option value="active" {{ old('status', $player->status) === 'active' ? 'selected' : '' }}>Activo</option>
                    <option value="inactive" {{ old('status', $player->status) === 'inactive' ? 'selected' : '' }}>Inactivo</option>
                </select>
                @error('status')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="notes">Observaciones</label>
                <textarea
                    id="notes"
                    name="notes"
                    rows="4"
                    style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px;"
                >{{ old('notes', $player->notes) }}</textarea>
                @error('notes')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn">Actualizar</button>
                <a href="{{ route('admin.players.index') }}" class="btn" style="background: #6b7280;">Cancelar</a>
            </div>
        </form>
    </div>
@endsection