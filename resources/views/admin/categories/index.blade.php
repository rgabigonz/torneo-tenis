@extends('layouts.app')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div>
                <h1 style="margin: 0;">Categorías</h1>
                <p style="margin: 8px 0 0 0;">Administración de categorías del torneo.</p>
            </div>

            <a href="{{ route('admin.categories.create') }}" class="btn">Nueva categoría</a>
        </div>

        @if (session('success'))
            <div class="alert" style="background: #dcfce7; color: #166534;">
                {{ session('success') }}
            </div>
        @endif

        @if ($categories->isEmpty())
            <p>No hay categorías cargadas.</p>
        @else
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #f8fafc;">
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Nombre</th>
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Orden</th>
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Activa</th>
                        <th style="text-align: left; padding: 12px; border-bottom: 1px solid #e5e7eb;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $category->name }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">{{ $category->sort_order }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                {{ $category->active ? 'Sí' : 'No' }}
                            </td>
                            <td style="padding: 12px; border-bottom: 1px solid #e5e7eb;">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn" style="margin-right: 8px;">
                                    Editar
                                </a>

                                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('¿Seguro que querés eliminar esta categoría?')"
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