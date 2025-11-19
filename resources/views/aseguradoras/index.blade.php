@extends('layouts.app3')

@section('title', 'Aseguradoras')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Lista de Aseguradoras</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('aseguradoras.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nueva Aseguradora
            </a>
        </div>
    </div>

    <!-- Mensajes de éxito/error -->
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

    <!-- Tabla de aseguradoras -->
    <div class="card">
        <div class="card-body">
            @if($aseguradoras->count() > 0)
                <form action="{{ route('aseguradoras.index') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text"
                            name="search"
                            class="form-control"
                            placeholder="Buscar por nombre o clave..."
                            value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i> Buscar
                        </button>
                        @if(request('search'))
                            <a href="{{ route('aseguradoras.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x"></i> Limpiar
                            </a>
                        @endif
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Fecha Inicial</th>
                                <th>Fecha Final</th>
                                <th>No. Seguro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aseguradoras as $aseguradora)
                                <tr>
                                    <td>{{ $aseguradora->clave_aseguradora }}</td>
                                    <td>{{ $aseguradora->nombre }}</td>
                                    <td>{{ $aseguradora->fecha_inicial->format('d/m/Y H:i') }}</td>
                                    <td>{{ $aseguradora->fecha_final->format('d/m/Y H:i') }}</td>
                                    <td>{{ $aseguradora->no_seguro }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('aseguradoras.show', $aseguradora->clave_aseguradora) }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('aseguradoras.edit', $aseguradora->clave_aseguradora) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <form action="{{ route('aseguradoras.destroy', $aseguradora->clave_aseguradora) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Está seguro de eliminar esta aseguradora?')">
                                                    <i class="bi bi-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $aseguradoras->links() }}
                    </div>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> No hay aseguradoras registradas.
                    <a href="{{ route('aseguradoras.create') }}">Crear la primera</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
