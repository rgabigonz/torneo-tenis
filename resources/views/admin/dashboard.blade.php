@extends('layouts.app')

@section('content')
    <div class="card">
        <h1 style="margin-top: 0;">Panel de Administrador</h1>
        <p>Desde acá vas a administrar temporadas, categorías, jugadores, torneos y resultados.</p>

        <div class="grid" style="margin-top: 24px;">
            <div class="menu-card">
                <h3>Categorías</h3>
                <p>Alta, baja y modificación de categorías.</p>
            </div>

            <div class="menu-card">
                <h3>Temporadas</h3>
                <p>Gestión de temporadas anuales o semestrales.</p>
            </div>

            <div class="menu-card">
                <h3>Jugadores</h3>
                <p>Alta, edición y asignación de usuarios del sistema.</p>
            </div>

            <div class="menu-card">
                <h3>Torneos</h3>
                <p>Creación de torneos, inscripciones y fixture.</p>
            </div>
        </div>
    </div>
@endsection