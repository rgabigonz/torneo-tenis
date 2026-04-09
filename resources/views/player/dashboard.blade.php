@extends('layouts.app')

@section('content')
    <div class="card">
        <h1 style="margin-top: 0;">Panel de Jugador</h1>
        <p>Acá vas a poder ver tus desafíos, cargar resultados y consultar tu ranking.</p>

        <div class="grid" style="margin-top: 24px;">
            <div class="menu-card">
                <h3>Mis partidos</h3>
                <p>Próximamente: desafíos pendientes, programados y jugados.</p>
            </div>

            <div class="menu-card">
                <h3>Mi categoría</h3>
                <p>Próximamente: tabla de posiciones y rivales.</p>
            </div>

            <div class="menu-card">
                <h3>Ranking anual</h3>
                <p>Próximamente: puntos acumulados y posición.</p>
            </div>
        </div>
    </div>
@endsection