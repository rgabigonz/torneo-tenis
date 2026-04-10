@extends('layouts.app')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div>
                <h1 style="margin: 0;">Jugadores</h1>
                <p style="margin: 8px 0 0 0;">Administración de jugadores del torneo.</p>
            </div>

            <a href="{{ route('admin.players.create') }}" class="btn">Nuevo jugador</a>
        </div>

        @if (session('success'))
            <div class="alert" style="background: #dcfce7; color: #166534;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif

        @if ($players->isEmpty())
            <p>No hay jugadores cargados.</p>
        @else
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #f8fafc;">
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Apellido y nombre</th>
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Email</th>
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Teléfono</th>
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Usuario vinculado</th>
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Estado</th>
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($players as $player)
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                {{ $player->last_name }}, {{ $player->first_name }}
                            </td>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                {{ $player->email ?: '-' }}
                            </td>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                {{ $player->phone ?: '-' }}
                            </td>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                {{ $player->user?->email ?: 'Sin vincular' }}
                            </td>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                {{ $player->status === 'active' ? 'Activo' : 'Inactivo' }}
                            </td>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                <a href="{{ route('admin.players.edit', $player) }}" class="btn" style="margin-right: 8px;">
                                    Editar
                                </a>

                                <form method="POST" action="{{ route('admin.players.destroy', $player) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('¿Seguro que querés eliminar este jugador?')"
                                    >
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="margin-top: 20px;">
                {{ $players->links() }}
            </div>
        @endif
    </div>
@endsection