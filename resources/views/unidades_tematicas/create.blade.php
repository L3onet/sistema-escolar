@extends('layouts.app2')

@section('title', 'Nueva Unidad Temática')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Nueva Unidad Temática</h4>
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

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('unidades_tematicas.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <!-- No. de Unidad -->
                            <div class="col-md-6 mb-3">
                                <label for="no_de_unidad" class="form-label">
                                    No. de Unidad <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control @error('no_de_unidad') is-invalid @enderror"
                                    id="no_de_unidad"
                                    name="no_de_unidad"
                                    value="{{ old('no_de_unidad') }}"
                                    placeholder="Ej: 1"
                                    required>
                                @error('no_de_unidad')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Número identificador de la unidad</small>
                            </div>

                            <!-- Materia -->
                            <div class="col-md-6 mb-3">
                                <label for="materia" class="form-label">
                                    Materia <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control @error('materia') is-invalid @enderror"
                                    id="materia"
                                    name="materia"
                                    value="{{ old('materia') }}"
                                    placeholder="Ej: Programación Web"
                                    required>
                                @error('materia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
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
                                value="{{ old('nombre_unidad') }}"
                                placeholder="Ej: Introducción a HTML y CSS"
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
                                required>{{ old('objetivo_aprendizaje') }}</textarea>
                            @error('objetivo_aprendizaje')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Máximo 400 caracteres</small>
                        </div>



                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('unidades_tematicas.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Guardar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
