@extends('layouts.app3')

@section('title', 'Editar Aseguradora')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Editar Aseguradora</h4>
                </div>
                <div class="card-body">

                    <!-- Mostrar errores de validación -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Error!</strong> Por favor corrija los siguientes errores:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Formulario -->
                    <form action="{{ route('aseguradoras.update', $aseguradora->clave_aseguradora) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Clave Aseguradora (Solo lectura) -->
                        <div class="mb-3">
                            <label for="clave_aseguradora" class="form-label">
                                Clave Aseguradora
                            </label>
                            <input
                                type="text"
                                class="form-control bg-light"
                                id="clave_aseguradora"
                                value="{{ $aseguradora->clave_aseguradora }}"
                                readonly
                                disabled>
                            <small class="text-muted">La clave no se puede modificar</small>
                        </div>

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">
                                Nombre <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control @error('nombre') is-invalid @enderror"
                                id="nombre"
                                name="nombre"
                                value="{{ old('nombre', $aseguradora->nombre) }}"
                                required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fecha Inicial -->
                        <div class="mb-3">
                            <label for="fecha_inicial" class="form-label">
                                Fecha Inicial <span class="text-danger">*</span>
                            </label>
                            <input
                                type="datetime-local"
                                class="form-control @error('fecha_inicial') is-invalid @enderror"
                                id="fecha_inicial"
                                name="fecha_inicial"
                                value="{{ old('fecha_inicial', $aseguradora->fecha_inicial->format('Y-m-d\TH:i')) }}"
                                required>
                            @error('fecha_inicial')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fecha Final -->
                        <div class="mb-3">
                            <label for="fecha_final" class="form-label">
                                Fecha Final <span class="text-danger">*</span>
                            </label>
                            <input
                                type="datetime-local"
                                class="form-control @error('fecha_final') is-invalid @enderror"
                                id="fecha_final"
                                name="fecha_final"
                                value="{{ old('fecha_final', $aseguradora->fecha_final->format('Y-m-d\TH:i')) }}"
                                required>
                            @error('fecha_final')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Número de Seguro -->
                        <div class="mb-3">
                            <label for="no_seguro" class="form-label">
                                Número de Seguro <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control @error('no_seguro') is-invalid @enderror"
                                id="no_seguro"
                                name="no_seguro"
                                value="{{ old('no_seguro', $aseguradora->no_seguro) }}"
                                required>
                            @error('no_seguro')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Información adicional -->
                        <div class="alert alert-info">
                            <small>
                                <strong>Fecha de creación:</strong> {{ $aseguradora->created_at->format('d/m/Y H:i') }}<br>
                                <strong>Última actualización:</strong> {{ $aseguradora->updated_at->format('d/m/Y H:i') }}
                            </small>
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('aseguradoras.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save"></i> Actualizar Aseguradora
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
