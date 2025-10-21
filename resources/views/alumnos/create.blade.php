@extends('layouts.app2')

@section('title', 'Registrar Alumno - Sistema Académico')

@section('content')
<div class="container">
    <!-- Encabezado -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>
                    <i class="bi bi-person-plus-fill"></i> Registrar Nuevo Alumno
                </h2>
                <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver al Listado
                </a>
            </div>
        </div>
    </div>

    <!-- Formulario -->
    <form action="{{ route('alumnos.store') }}" method="POST">
        @csrf

        <!-- Información Básica -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-person-badge"></i> Información Básica
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <!-- Número de Control -->
                    <div class="col-md-4">
                        <label for="no_de_control" class="form-label">
                            Número de Control <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('no_de_control') is-invalid @enderror" 
                               id="no_de_control" 
                               name="no_de_control" 
                               value="{{ old('no_de_control') }}"
                               maxlength="10"
                               required>
                        @error('no_de_control')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nombre -->
                    <div class="col-md-4">
                        <label for="nombre_alumno" class="form-label">
                            Nombre(s) <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('nombre_alumno') is-invalid @enderror" 
                               id="nombre_alumno" 
                               name="nombre_alumno" 
                               value="{{ old('nombre_alumno') }}"
                               maxlength="100"
                               required>
                        @error('nombre_alumno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Apellido Paterno -->
                    <div class="col-md-4">
                        <label for="apellido_paterno" class="form-label">
                            Apellido Paterno
                        </label>
                        <input type="text" 
                               class="form-control @error('apellido_paterno') is-invalid @enderror" 
                               id="apellido_paterno" 
                               name="apellido_paterno" 
                               value="{{ old('apellido_paterno') }}"
                               maxlength="100">
                        @error('apellido_paterno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Apellido Materno -->
                    <div class="col-md-4">
                        <label for="apellido_materno" class="form-label">
                            Apellido Materno
                        </label>
                        <input type="text" 
                               class="form-control @error('apellido_materno') is-invalid @enderror" 
                               id="apellido_materno" 
                               name="apellido_materno" 
                               value="{{ old('apellido_materno') }}"
                               maxlength="100">
                        @error('apellido_materno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- CURP -->
                    <div class="col-md-4">
                        <label for="curp_alumno" class="form-label">
                            CURP
                        </label>
                        <input type="text" 
                               class="form-control @error('curp_alumno') is-invalid @enderror" 
                               id="curp_alumno" 
                               name="curp_alumno" 
                               value="{{ old('curp_alumno') }}"
                               maxlength="18"
                               style="text-transform: uppercase;">
                        @error('curp_alumno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Fecha de Nacimiento -->
                    <div class="col-md-4">
                        <label for="fecha_nacimiento" class="form-label">
                            Fecha de Nacimiento
                        </label>
                        <input type="date" 
                               class="form-control @error('fecha_nacimiento') is-invalid @enderror" 
                               id="fecha_nacimiento" 
                               name="fecha_nacimiento" 
                               value="{{ old('fecha_nacimiento') }}">
                        @error('fecha_nacimiento')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Sexo -->
                    <div class="col-md-3">
                        <label for="sexo" class="form-label">
                            Sexo
                        </label>
                        <select class="form-select @error('sexo') is-invalid @enderror" 
                                id="sexo" 
                                name="sexo">
                            <option value="">Seleccione...</option>
                            <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
                        </select>
                        @error('sexo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Estado Civil -->
                    <div class="col-md-3">
                        <label for="estado_civil" class="form-label">
                            Estado Civil
                        </label>
                        <select class="form-select @error('estado_civil') is-invalid @enderror" 
                                id="estado_civil" 
                                name="estado_civil">
                            <option value="">Seleccione...</option>
                            <option value="S" {{ old('estado_civil') == 'S' ? 'selected' : '' }}>Soltero(a)</option>
                            <option value="C" {{ old('estado_civil') == 'C' ? 'selected' : '' }}>Casado(a)</option>
                            <option value="D" {{ old('estado_civil') == 'D' ? 'selected' : '' }}>Divorciado(a)</option>
                            <option value="V" {{ old('estado_civil') == 'V' ? 'selected' : '' }}>Viudo(a)</option>
                            <option value="U" {{ old('estado_civil') == 'U' ? 'selected' : '' }}>Unión Libre</option>
                        </select>
                        @error('estado_civil')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nacionalidad -->
                    <div class="col-md-3">
                        <label for="nacionalidad" class="form-label">
                            Nacionalidad
                        </label>
                        <input type="text" 
                               class="form-control @error('nacionalidad') is-invalid @enderror" 
                               id="nacionalidad" 
                               name="nacionalidad" 
                               value="{{ old('nacionalidad', 'MEX') }}"
                               maxlength="3">
                        @error('nacionalidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="col-md-6">
                        <label for="correo_electronico" class="form-label">
                            Correo Electrónico
                        </label>
                        <input type="email" 
                               class="form-control @error('correo_electronico') is-invalid @enderror" 
                               id="correo_electronico" 
                               name="correo_electronico" 
                               value="{{ old('correo_electronico') }}"
                               maxlength="60">
                        @error('correo_electronico')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Información Académica -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">
                    <i class="bi bi-book"></i> Información Académica
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <!-- Carrera -->
                    <div class="col-md-3">
                        <label for="carrera" class="form-label">
                            Carrera
                        </label>
                        <input type="text" 
                               class="form-control @error('carrera') is-invalid @enderror" 
                               id="carrera" 
                               name="carrera" 
                               value="{{ old('carrera') }}"
                               maxlength="3"
                               placeholder="Ej: ISC">
                        @error('carrera')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Retícula -->
                    <div class="col-md-3">
                        <label for="reticula" class="form-label">
                            Retícula
                        </label>
                        <input type="number" 
                               class="form-control @error('reticula') is-invalid @enderror" 
                               id="reticula" 
                               name="reticula" 
                               value="{{ old('reticula') }}">
                        @error('reticula')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Especialidad -->
                    <div class="col-md-3">
                        <label for="especialidad" class="form-label">
                            Especialidad
                        </label>
                        <input type="text" 
                               class="form-control @error('especialidad') is-invalid @enderror" 
                               id="especialidad" 
                               name="especialidad" 
                               value="{{ old('especialidad') }}"
                               maxlength="5">
                        @error('especialidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Plan de Estudios -->
                    <div class="col-md-3">
                        <label for="plan_de_estudios" class="form-label">
                            Plan de Estudios <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('plan_de_estudios') is-invalid @enderror" 
                               id="plan_de_estudios" 
                               name="plan_de_estudios" 
                               value="{{ old('plan_de_estudios') }}"
                               maxlength="1"
                               required>
                        @error('plan_de_estudios')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nivel Escolar -->
                    <div class="col-md-3">
                        <label for="nivel_escolar" class="form-label">
                            Nivel Escolar
                        </label>
                        <select class="form-select @error('nivel_escolar') is-invalid @enderror" 
                                id="nivel_escolar" 
                                name="nivel_escolar">
                            <option value="">Seleccione...</option>
                            <option value="L" {{ old('nivel_escolar') == 'L' ? 'selected' : '' }}>Licenciatura</option>
                            <option value="M" {{ old('nivel_escolar') == 'M' ? 'selected' : '' }}>Maestría</option>
                            <option value="D" {{ old('nivel_escolar') == 'D' ? 'selected' : '' }}>Doctorado</option>
                        </select>
                        @error('nivel_escolar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Semestre -->
                    <div class="col-md-3">
                        <label for="semestre" class="form-label">
                            Semestre
                        </label>
                        <input type="number" 
                               class="form-control @error('semestre') is-invalid @enderror" 
                               id="semestre" 
                               name="semestre" 
                               value="{{ old('semestre') }}"
                               min="1"
                               max="12">
                        @error('semestre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tipo de Ingreso -->
                    <div class="col-md-3">
                        <label for="tipo_ingreso" class="form-label">
                            Tipo de Ingreso <span class="text-danger">*</span>
                        </label>
                        <select class="form-select @error('tipo_ingreso') is-invalid @enderror" 
                                id="tipo_ingreso" 
                                name="tipo_ingreso"
                                required>
                            <option value="">Seleccione...</option>
                            <option value="1" {{ old('tipo_ingreso') == '1' ? 'selected' : '' }}>Nuevo Ingreso</option>
                            <option value="2" {{ old('tipo_ingreso') == '2' ? 'selected' : '' }}>Reingreso</option>
                            <option value="3" {{ old('tipo_ingreso') == '3' ? 'selected' : '' }}>Transferencia</option>
                            <option value="4" {{ old('tipo_ingreso') == '4' ? 'selected' : '' }}>Equivalencia</option>
                        </select>
                        @error('tipo_ingreso')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Periodo de Ingreso -->
                    <div class="col-md-3">
                        <label for="periodo_ingreso_it" class="form-label">
                            Periodo de Ingreso <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('periodo_ingreso_it') is-invalid @enderror" 
                               id="periodo_ingreso_it" 
                               name="periodo_ingreso_it" 
                               value="{{ old('periodo_ingreso_it') }}"
                               maxlength="5"
                               placeholder="Ej: 20241"
                               required>
                        @error('periodo_ingreso_it')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Estatus Alumno -->
                    <div class="col-md-3">
                        <label for="estatus_alumno" class="form-label">
                            Estatus
                        </label>
                        <select class="form-select @error('estatus_alumno') is-invalid @enderror" 
                                id="estatus_alumno" 
                                name="estatus_alumno">
                            <option value="ACT" {{ old('estatus_alumno', 'ACT') == 'ACT' ? 'selected' : '' }}>Activo</option>
                            <option value="INA" {{ old('estatus_alumno') == 'INA' ? 'selected' : '' }}>Inactivo</option>
                            <option value="BAJ" {{ old('estatus_alumno') == 'BAJ' ? 'selected' : '' }}>Baja</option>
                            <option value="EGR" {{ old('estatus_alumno') == 'EGR' ? 'selected' : '' }}>Egresado</option>
                            <option value="TIT" {{ old('estatus_alumno') == 'TIT' ? 'selected' : '' }}>Titulado</option>
                        </select>
                        @error('estatus_alumno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tipo de Alumno -->
                    <div class="col-md-3">
                        <label for="tipo_alumno" class="form-label">
                            Tipo de Alumno
                        </label>
                        <input type="text" 
                               class="form-control @error('tipo_alumno') is-invalid @enderror" 
                               id="tipo_alumno" 
                               name="tipo_alumno" 
                               value="{{ old('tipo_alumno') }}"
                               maxlength="2">
                        @error('tipo_alumno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Clave Interna -->
                    <div class="col-md-3">
                        <label for="clave_interna" class="form-label">
                            Clave Interna
                        </label>
                        <input type="text" 
                               class="form-control @error('clave_interna') is-invalid @enderror" 
                               id="clave_interna" 
                               name="clave_interna" 
                               value="{{ old('clave_interna') }}"
                               maxlength="10">
                        @error('clave_interna')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- NIP -->
                    <div class="col-md-3">
                        <label for="nip" class="form-label">
                            NIP
                        </label>
                        <input type="number" 
                               class="form-control @error('nip') is-invalid @enderror" 
                               id="nip" 
                               name="nip" 
                               value="{{ old('nip') }}">
                        @error('nip')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Información Adicional -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">
                    <i class="bi bi-info-circle"></i> Información Adicional
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <!-- Escuela de Procedencia -->
                    <div class="col-md-6">
                        <label for="escuela_procedencia" class="form-label">
                            Escuela de Procedencia
                        </label>
                        <input type="text" 
                               class="form-control @error('escuela_procedencia') is-invalid @enderror" 
                               id="escuela_procedencia" 
                               name="escuela_procedencia" 
                               value="{{ old('escuela_procedencia') }}"
                               maxlength="50">
                        @error('escuela_procedencia')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tipo de Escuela -->
                    <div class="col-md-3">
                        <label for="tipo_escuela" class="form-label">
                            Tipo de Escuela
                        </label>
                        <select class="form-select @error('tipo_escuela') is-invalid @enderror" 
                                id="tipo_escuela" 
                                name="tipo_escuela">
                            <option value="">Seleccione...</option>
                            <option value="1" {{ old('tipo_escuela') == '1' ? 'selected' : '' }}>Pública</option>
                            <option value="2" {{ old('tipo_escuela') == '2' ? 'selected' : '' }}>Privada</option>
                        </select>
                        @error('tipo_escuela')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Entidad de Procedencia -->
                    <div class="col-md-3">
                        <label for="entidad_procedencia" class="form-label">
                            Entidad de Procedencia
                        </label>
                        <input type="text" 
                               class="form-control @error('entidad_procedencia') is-invalid @enderror" 
                               id="entidad_procedencia" 
                               name="entidad_procedencia" 
                               value="{{ old('entidad_procedencia') }}"
                               maxlength="50">
                        @error('entidad_procedencia')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Ciudad de Procedencia -->
                    <div class="col-md-3">
                        <label for="ciudad_procedencia" class="form-label">
                            Ciudad de Procedencia
                        </label>
                        <input type="text" 
                               class="form-control @error('ciudad_procedencia') is-invalid @enderror" 
                               id="ciudad_procedencia" 
                               name="ciudad_procedencia" 
                               value="{{ old('ciudad_procedencia') }}"
                               maxlength="50">
                        @error('ciudad_procedencia')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Domicilio Escuela -->
                    <div class="col-md-9">
                        <label for="domicilio_escuela" class="form-label">
                            Domicilio de la Escuela
                        </label>
                        <input type="text" 
                               class="form-control @error('domicilio_escuela') is-invalid @enderror" 
                               id="domicilio_escuela" 
                               name="domicilio_escuela" 
                               value="{{ old('domicilio_escuela') }}"
                               maxlength="60">
                        @error('domicilio_escuela')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tipo de Servicio Médico -->
                    <div class="col-md-3">
                        <label for="tipo_servicio_medico" class="form-label">
                            Tipo de Servicio Médico
                        </label>
                        <select class="form-select @error('tipo_servicio_medico') is-invalid @enderror" 
                                id="tipo_servicio_medico" 
                                name="tipo_servicio_medico">
                            <option value="">Seleccione...</option>
                            <option value="I" {{ old('tipo_servicio_medico') == 'I' ? 'selected' : '' }}>IMSS</option>
                            <option value="S" {{ old('tipo_servicio_medico') == 'S' ? 'selected' : '' }}>ISSSTE</option>
                            <option value="P" {{ old('tipo_servicio_medico') == 'P' ? 'selected' : '' }}>Privado</option>
                            <option value="N" {{ old('tipo_servicio_medico') == 'N' ? 'selected' : '' }}>Ninguno</option>
                        </select>
                        @error('tipo_servicio_medico')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Clave Servicio Médico -->
                    <div class="col-md-3">
                        <label for="clave_servicio_medico" class="form-label">
                            Clave Servicio Médico
                        </label>
                        <input type="text" 
                               class="form-control @error('clave_servicio_medico') is-invalid @enderror" 
                               id="clave_servicio_medico" 
                               name="clave_servicio_medico" 
                               value="{{ old('clave_servicio_medico') }}"
                               maxlength="20">
                        @error('clave_servicio_medico')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Becado Por -->
                    <div class="col-md-6">
                        <label for="becado_por" class="form-label">
                            Becado Por
                        </label>
                        <input type="text" 
                               class="form-control @error('becado_por') is-invalid @enderror" 
                               id="becado_por" 
                               name="becado_por" 
                               value="{{ old('becado_por') }}"
                               maxlength="100"
                               placeholder="Institución o programa de beca">
                        @error('becado_por')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Botones de Acción -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Registrar Alumno
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
    // Convertir CURP a mayúsculas automáticamente
    document.getElementById('curp_alumno').addEventListener('input', function(e) {
        e.target.value = e.target.value.toUpperCase();
    });

    // Validar formato de periodo (5 caracteres)
    document.getElementById('periodo_ingreso_it').addEventListener('input', function(e) {
        // Solo permitir números
        e.target.value = e.target.value.replace(/[^0-9]/g, '');
    });

    // Validar número de control (solo números y letras)
    document.getElementById('no_de_control').addEventListener('input', function(e) {
        e.target.value = e.target.value.toUpperCase();
    });
</script>
@endpush
@endsection