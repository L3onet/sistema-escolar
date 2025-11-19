@extends('layouts.app3')

@section('title', 'Nueva Aseguradora')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Nueva Aseguradora</h4>
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
                    <form action="{{ route('aseguradoras.store') }}" method="POST">
                        @csrf

                        <!-- Clave Aseguradora -->
                        <div class="mb-3">
                            <label for="clave_aseguradora" class="form-label">
                                Clave Aseguradora <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control @error('clave_aseguradora') is-invalid @enderror"
                                id="clave_aseguradora"
                                name="clave_aseguradora"
                                value="{{ old('clave_aseguradora') }}"
                                placeholder="Ej: ASG001"
                                required>
                            @error('clave_aseguradora')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                                value="{{ old('nombre') }}"
                                placeholder="Ej: Seguros Atlas"
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
                                value="{{ old('fecha_inicial') }}"
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
                                value="{{ old('fecha_final') }}"
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
                                value="{{ old('no_seguro') }}"
                                placeholder="Ej: SEG-2024-001"
                                required>
                            @error('no_seguro')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('aseguradoras.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Guardar Aseguradora
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
