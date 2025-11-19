@extends('layouts.app3')

@section('title', 'Editar Unidad Temática')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Editar Unidad Temática</h4>
                </div>
                <div class="card-body">

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

                    <form action="{{ route('unidades_tematicas.update', [$unidad->no_de_unidad, $unidad->materia]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- No. de Unidad (Solo lectura) -->
                            <div class="col-md-6 mb-3">
                                <label for="no_de_unidad" class="form-label">
                                    No. de Unidad
                                </label>
                                <input
                                    type="text"
                                    class="form-control bg-light"
                                    id="no_de_unidad"
                                    value="{{ $unidad->no_de_unidad }}"
                                    readonly
                                    disabled>
                                <small class="text-muted">Este campo no se puede modificar</small>
                            </div>

                            <!-- Materia (Solo lectura) -->
                            <div class="col-md-6 mb-3">
                                <label for="materia" class="form-label">
                                    Materia
                                </label>
                                <input
                                    type="text"
                                    class="form-control bg-light"
                                    id="materia"
                                    value="{{ $unidad->materia }}"
                                    readonly
                                    disabled>
                                <small class="text-muted">Este campo no se puede modificar</small>
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <i class="bi bi-lock"></i>
                            <strong>Nota:</strong> La llave primaria compuesta (No. de Unidad + Materia) no se puede modificar.
                        </div>

                        <!-- Nombre de la Unidad -->
                        <div class="mb-3">
                            <label for="nombre_unidad" class="form-label">
                                Nombre de la Unidad <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control @error('nombre_unidad') is-invalid @enderror"
                                id="nombre_unidad"
                                name="nombre_unidad"
                                value="{{ old('nombre_unidad', $unidad->nombre_unidad) }}"
                                required>
                            @error('nombre_unidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Objetivo de Aprendizaje -->
                        <div class="mb-3">
                            <label for="objetivo_aprendizaje" class="form-label">
                                Objetivo de Aprendizaje <span class="text-danger">*</span>
                            </label>
                            <textarea
                                class="form-control @error('objetivo_aprendizaje') is-invalid @enderror"
                                id="objetivo_aprendizaje"
                                name="objetivo_aprendizaje"
                                rows="4"
                                required>{{ old('objetivo_aprendizaje', $unidad->objetivo_aprendizaje) }}</textarea>
                            @error('objetivo_aprendizaje')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Máximo 400 caracteres</small>
                        </div>

                        <!-- Información adicional -->
                        <div class="alert alert-secondary">
                            <small>
                                <strong>Fecha de creación:</strong> {{ $unidad->created_at->format('d/m/Y H:i') }}<br>
                                <strong>Última actualización:</strong> {{ $unidad->updated_at->format('d/m/Y H:i') }}
                            </small>
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('unidades_tematicas.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save"></i> Actualizar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
