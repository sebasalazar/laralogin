@extends('layouts.main')

@section('contenido')

<h1>Bienvenido</h1>
<p>Se ha autenticado exitosamente.</p>

@if (count($data) > 0)
<h2>Ingresos Totales</h2>
<div class="datagrid">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad de Accesos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grupo as $fila)
            <tr>
                <td>{{ \App\RutUtils::formatear( $fila->rut ) }}</td>
                <td>{{ $fila->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

@if (count($data) > 0)
<h2>Últimos Ingresos</h2>
<div class="datagrid">
    <table>
        <thead>
            <tr>
                <th>Rut</th>
                <th>Fecha</th>
                <th>IP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $fila)
            <tr>
                <td>{{ \App\RutUtils::formatear( $fila->rut ) }}</td>
                <td>{{ $fila->fecha }}</td>
                <td>{{ $fila->ip }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

@stop