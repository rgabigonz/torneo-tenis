@extends('layouts.app')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div>
                <h1 style="margin: 0;">Temporadas</h1>
                <p style="margin: 8px 0 0 0;">Administración de temporadas del torneo.</p>
            </div>

            <a href="{{ route('admin.seasons.create') }}" class="btn">Nueva temporada</a>
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

        @if ($seasons->isEmpty())
            <p>No hay temporadas cargadas.</p>
        @else
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #f8fafc;">
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Nombre</th>
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Año</th>
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Inicio</th>
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Fin</th>
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Activa</th>
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($seasons as $season)
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $season->name }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $season->year }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $season->start_date->format('d/m/Y') }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $season->end_date->format('d/m/Y') }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                {{ $season->active ? 'Sí' : 'No' }}
                            </td>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                <a href="{{ route('admin.seasons.edit', $season) }}" class="btn" style="margin-right: 8px;">
                                    Editar
                                </a>

                                <form method="POST" action="{{ route('admin.seasons.destroy', $season) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('¿Seguro que querés eliminar esta temporada?')"
                                    >
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection