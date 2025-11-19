@extends('layouts.app3')

@section('title', 'Unidades Temáticas')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Unidades Temáticas</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('unidades_tematicas.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nueva Unidad Temática
            </a>
        </div>
    </div>

    <!-- Mensajes -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tabla -->
    <div class="card">
        <div class="card-body">
            @if($unidades->count() > 0)
                <div class="table-responsive">
                    <!-- Agregar antes de la tabla -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('unidades_tematicas.index') }}" method="GET">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <input type="text"
                                            name="no_unidad"
                                            class="form-control"
                                            placeholder="No. Unidad"
                                            value="{{ request('no_unidad') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text"
                                            name="materia"
                                            class="form-control"
                                            placeholder="Materia"
                                            value="{{ request('materia') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text"
                                            name="search"
                                            class="form-control"
                                            placeholder="Buscar en nombre u objetivo..."
                                            value="{{ request('search') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="bi bi-search"></i> Buscar
                                        </button>
                                    </div>
                                </div>

                                @if(request()->hasAny(['no_unidad', 'materia', 'search']))
                                    <div class="mt-2">
                                        <a href="{{ route('unidades_tematicas.index') }}" class="btn btn-sm btn-secondary">
                                            <i class="bi bi-x"></i> Limpiar filtros
                                        </a>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No. Unidad</th>
                                <th>Materia</th>
                                <th>Nombre Unidad</th>
                                <th>Objetivo de Aprendizaje</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unidades as $unidad)
                                <tr>
                                    <td>{{ $unidad->no_de_unidad }}</td>
                                    <td>{{ $unidad->materia }}</td>
                                    <td>{{ $unidad->nombre_unidad }}</td>
                                    <td>{{ Str::limit($unidad->objetivo_aprendizaje, 80) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('unidades_tematicas.show', [$unidad->no_de_unidad, $unidad->materia]) }}"
                                               class="btn btn-sm btn-info"
                                               title="Ver detalle">
                                                <i class="bi bi-eye">Ver</i>
                                            </a>
                                            <a href="{{ route('unidades_tematicas.edit', [$unidad->no_de_unidad, $unidad->materia]) }}"
                                               class="btn btn-sm btn-warning"
                                               title="Editar">
                                                <i class="bi bi-pencil">Editar</i>
                                            </a>
                                            <form action="{{ route('unidades_tematicas.destroy', [$unidad->no_de_unidad, $unidad->materia]) }}"
                                                  method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        title="Eliminar"
                                                        onclick="return confirm('¿Está seguro de eliminar esta unidad temática?')">
                                                    <i class="bi bi-trash">Eliminar</i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $unidades->links() }}
                    </div>

                </div>
            @else
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> No hay unidades temáticas registradas.
                    <a href="{{ route('unidades_tematicas.create') }}">Crear la primera</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
