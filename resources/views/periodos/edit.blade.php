@extends('layouts.app3')

@section('title', 'Editar Período Escolar')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Editar Período Escolar: <span class="text-primary">{{ $periodoEscolar->periodo }}</span></h1>
        <a href="{{ route('periodos-escolares.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Volver al Listado
        </a>
    </div>

    <!-- Alertas de Error -->
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>¡Error!</strong> Por favor corrige los siguientes errores:
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Formulario -->
    <form action="{{ route('periodos-escolares.update', $periodoEscolar->periodo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Información General</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <!-- Período (Solo lectura) -->
                    <div class="col-md-4">
                        <label for="periodo" class="form-label">Período</label>
                        <input type="text"
                               class="form-control"
                               id="periodo"
                               value="{{ $periodoEscolar->periodo }}"
                               disabled>
                        <small class="form-text text-muted">El período no se puede modificar</small>
                    </div>

                    <!-- Identificación Larga -->
                    <div class="col-md-4">
                        <label for="identificacion_larga" class="form-label">Identificación Larga <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('identificacion_larga') is-invalid @enderror"
                               id="identificacion_larga"
                               name="identificacion_larga"
                               value="{{ old('identificacion_larga', $periodoEscolar->identificacion_larga) }}"
                               maxlength="30"
                               required>
                        @error('identificacion_larga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Identificación Corta -->
                    <div class="col-md-4">
                        <label for="identificacion_corta" class="form-label">Identificación Corta <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('identificacion_corta') is-invalid @enderror"
                               id="identificacion_corta"
                               name="identificacion_corta"
                               value="{{ old('identificacion_corta', $periodoEscolar->identificacion_corta) }}"
                               maxlength="12"
                               required>
                        @error('identificacion_corta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="col-md-4">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror"
                                id="status"
                                name="status"
                                required>
                            <option value="">Seleccione...</option>
                            <option value="A" {{ old('status', $periodoEscolar->status) == 'A' ? 'selected' : '' }}>Activo</option>
                            <option value="I" {{ old('status', $periodoEscolar->status) == 'I' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Número de Días Clase -->
                    <div class="col-md-4">
                        <label for="num_dias_clase" class="form-label">Número de Días de Clase <span class="text-danger">*</span></label>
                        <input type="number"
                               class="form-control @error('num_dias_clase') is-invalid @enderror"
                               id="num_dias_clase"
                               name="num_dias_clase"
                               value="{{ old('num_dias_clase', $periodoEscolar->num_dias_clase) }}"
                               min="1"
                               required>
                        @error('num_dias_clase')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Cierre Horarios -->
                    <div class="col-md-2">
                        <label for="cierre_horarios" class="form-label">Cierre Horarios <span class="text-danger">*</span></label>
                        <select class="form-select @error('cierre_horarios') is-invalid @enderror"
                                id="cierre_horarios"
                                name="cierre_horarios"
                                required>
                            <option value="">Seleccione...</option>
                            <option value="S" {{ old('cierre_horarios', $periodoEscolar->cierre_horarios) == 'S' ? 'selected' : '' }}>Sí</option>
                            <option value="N" {{ old('cierre_horarios', $periodoEscolar->cierre_horarios) == 'N' ? 'selected' : '' }}>No</option>
                        </select>
                        @error('cierre_horarios')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Cierre Selección -->
                    <div class="col-md-2">
                        <label for="cierre_seleccion" class="form-label">Cierre Selección <span class="text-danger">*</span></label>
                        <select class="form-select @error('cierre_seleccion') is-invalid @enderror"
                                id="cierre_seleccion"
                                name="cierre_seleccion"
                                required>
                            <option value="">Seleccione...</option>
                            <option value="S" {{ old('cierre_seleccion', $periodoEscolar->cierre_seleccion) == 'S' ? 'selected' : '' }}>Sí</option>
                            <option value="N" {{ old('cierre_seleccion', $periodoEscolar->cierre_seleccion) == 'N' ? 'selected' : '' }}>No</option>
                        </select>
                        @error('cierre_seleccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Filtro -->
                    <div class="col-md-4">
                        <label for="filtro" class="form-label">Filtro</label>
                        <input type="text"
                               class="form-control @error('filtro') is-invalid @enderror"
                               id="filtro"
                               name="filtro"
                               value="{{ old('filtro', $periodoEscolar->filtro) }}"
                               maxlength="1">
                        @error('filtro')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Fechas del Período -->
        <div class="card mt-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Fechas del Período</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <!-- Fecha Inicio -->
                    <div class="col-md-6">
                        <label for="fecha_inicio" class="form-label">Fecha de Inicio <span class="text-danger">*</span></label>
                        <input type="date"
                               class="form-control @error('fecha_inicio') is-invalid @enderror"
                               id="fecha_inicio"
                               name="fecha_inicio"
                               value="{{ old('fecha_inicio', $periodoEscolar->fecha_inicio?->format('Y-m-d')) }}"
                               required>
                        @error('fecha_inicio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Fecha Término -->
                    <div class="col-md-6">
                        <label for="fecha_termino" class="form-label">Fecha de Término <span class="text-danger">*</span></label>
                        <input type="date"
                               class="form-control @error('fecha_termino') is-invalid @enderror"
                               id="fecha_termino"
                               name="fecha_termino"
                               value="{{ old('fecha_termino', $periodoEscolar->fecha_termino?->format('Y-m-d')) }}"
                               required>
                        @error('fecha_termino')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Fechas Vacacionales -->
        <div class="card mt-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Períodos Vacacionales</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <!-- Inicio Vacacional SS -->
                    <div class="col-md-6">
                        <label for="inicio_vacacional_ss" class="form-label">Inicio Vacacional SS <span class="text-danger">*</span></label>
                        <input type="date"
                               class="form-control @error('inicio_vacacional_ss') is-invalid @enderror"
                               id="inicio_vacacional_ss"
                               name="inicio_vacacional_ss"
                               value="{{ old('inicio_vacacional_ss', $periodoEscolar->inicio_vacacional_ss?->format('Y-m-d')) }}"
                               required>
                        @error('inicio_vacacional_ss')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Término Vacacional SS -->
                    <div class="col-md-6">
                        <label for="termino_vacacional_ss" class="form-label">Término Vacacional SS <span class="text-danger">*</span></label>
                        <input type="date"
                               class="form-control @error('termino_vacacional_ss') is-invalid @enderror"
                               id="termino_vacacional_ss"
                               name="termino_vacacional_ss"
                               value="{{ old('termino_vacacional_ss', $periodoEscolar->termino_vacacional_ss?->format('Y-m-d')) }}"
                               required>
                        @error('termino_vacacional_ss')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Inicio Vacacional -->
                    <div class="col-md-6">
                        <label for="inicio_vacacional" class="form-label">Inicio Vacacional</label>
                        <input type="date"
                               class="form-control @error('inicio_vacacional') is-invalid @enderror"
                               id="inicio_vacacional"
                               name="inicio_vacacional"
                               value="{{ old('inicio_vacacional', $periodoEscolar->inicio_vacacional?->format('Y-m-d')) }}">
                        @error('inicio_vacacional')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Término Vacacional -->
                    <div class="col-md-6">
                        <label for="termino_vacacional" class="form-label">Término Vacacional</label>
                        <input type="date"
                               class="form-control @error('termino_vacacional') is-invalid @enderror"
                               id="termino_vacacional"
                               name="termino_vacacional"
                               value="{{ old('termino_vacacional', $periodoEscolar->termino_vacacional?->format('Y-m-d')) }}">
                        @error('termino_vacacional')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Período Especial -->
        <div class="card mt-4">
            <div class="card-header bg-warning">
                <h5 class="mb-0">Período Especial</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <!-- Inicio Especial -->
                    <div class="col-md-6">
                        <label for="inicio_especial" class="form-label">Inicio Especial</label>
                        <input type="date"
                               class="form-control @error('inicio_especial') is-invalid @enderror"
                               id="inicio_especial"
                               name="inicio_especial"
                               value="{{ old('inicio_especial', $periodoEscolar->inicio_especial?->format('Y-m-d')) }}">
                        @error('inicio_especial')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Fin Especial -->
                    <div class="col-md-6">
                        <label for="fin_especial" class="form-label">Fin Especial</label>
                        <input type="date"
                               class="form-control @error('fin_especial') is-invalid @enderror"
                               id="fin_especial"
                               name="fin_especial"
                               value="{{ old('fin_especial', $periodoEscolar->fin_especial?->format('Y-m-d')) }}">
                        @error('fin_especial')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Parciales -->
        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">Períodos de Parciales</h5>
            </div>
            <div class="card-body">
                <!-- Parcial 1 -->
                <h6 class="text-primary mb-3">Parcial 1</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="parcial1_inicio" class="form-label">Inicio Parcial 1</label>
                        <input type="date"
                               class="form-control @error('parcial1_inicio') is-invalid @enderror"
                               id="parcial1_inicio"
                               name="parcial1_inicio"
                               value="{{ old('parcial1_inicio', $periodoEscolar->parcial1_inicio?->format('Y-m-d')) }}">
                        @error('parcial1_inicio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="parcial1_fin" class="form-label">Fin Parcial 1</label>
                        <input type="date"
                               class="form-control @error('parcial1_fin') is-invalid @enderror"
                               id="parcial1_fin"
                               name="parcial1_fin"
                               value="{{ old('parcial1_fin', $periodoEscolar->parcial1_fin?->format('Y-m-d')) }}">
                        @error('parcial1_fin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Parcial 2 -->
                <h6 class="text-primary mb-3">Parcial 2</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="parcial2_inicio" class="form-label">Inicio Parcial 2</label>
                        <input type="date"
                               class="form-control @error('parcial2_inicio') is-invalid @enderror"
                               id="parcial2_inicio"
                               name="parcial2_inicio"
                               value="{{ old('parcial2_inicio', $periodoEscolar->parcial2_inicio?->format('Y-m-d')) }}">
                        @error('parcial2_inicio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="parcial2_fin" class="form-label">Fin Parcial 2</label>
                        <input type="date"
                               class="form-control @error('parcial2_fin') is-invalid @enderror"
                               id="parcial2_fin"
                               name="parcial2_fin"
                               value="{{ old('parcial2_fin', $periodoEscolar->parcial2_fin?->format('Y-m-d')) }}">
                        @error('parcial2_fin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Parcial 3 -->
                <h6 class="text-primary mb-3">Parcial 3</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="parcial3_inicio" class="form-label">Inicio Parcial 3</label>
                        <input type="date"
                               class="form-control @error('parcial3_inicio') is-invalid @enderror"
                               id="parcial3_inicio"
                               name="parcial3_inicio"
                               value="{{ old('parcial3_inicio', $periodoEscolar->parcial3_inicio?->format('Y-m-d')) }}">
                        @error('parcial3_inicio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="parcial3_fin" class="form-label">Fin Parcial 3</label>
                        <input type="date"
                               class="form-control @error('parcial3_fin') is-invalid @enderror"
                               id="parcial3_fin"
                               name="parcial3_fin"
                               value="{{ old('parcial3_fin', $periodoEscolar->parcial3_fin?->format('Y-m-d')) }}">
                        @error('parcial3_fin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Encuestas y Selección -->
        <div class="card mt-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Encuestas y Selección de Alumnos</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <!-- Encuesta Estudiantil -->
                    <div class="col-md-6">
                        <label for="inicio_enc_estudiantil" class="form-label">Inicio Encuesta Estudiantil</label>
                        <input type="date"
                               class="form-control @error('inicio_enc_estudiantil') is-invalid @enderror"
                               id="inicio_enc_estudiantil"
                               name="inicio_enc_estudiantil"
                               value="{{ old('inicio_enc_estudiantil', $periodoEscolar->inicio_enc_estudiantil?->format('Y-m-d')) }}">
                        @error('inicio_enc_estudiantil')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="fin_enc_estudiantil" class="form-label">Fin Encuesta Estudiantil</label>
                        <input type="date"
                               class="form-control @error('fin_enc_estudiantil') is-invalid @enderror"
                               id="fin_enc_estudiantil"
                               name="fin_enc_estudiantil"
                               value="{{ old('fin_enc_estudiantil', $periodoEscolar->fin_enc_estudiantil?->format('Y-m-d')) }}">
                        @error('fin_enc_estudiantil')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Selección Alumnos -->
                    <div class="col-md-6">
                        <label for="inicio_sele_alumnos" class="form-label">Inicio Selección Alumnos</label>
                        <input type="date"
                               class="form-control @error('inicio_sele_alumnos') is-invalid @enderror"
                               id="inicio_sele_alumnos"
                               name="inicio_sele_alumnos"
                               value="{{ old('inicio_sele_alumnos', $periodoEscolar->inicio_sele_alumnos?->format('Y-m-d')) }}">
                        @error('inicio_sele_alumnos')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="fin_sele_alumnos" class="form-label">Fin Selección Alumnos</label>
                        <input type="date"
                               class="form-control @error('fin_sele_alumnos') is-invalid @enderror"
                               id="fin_sele_alumnos"
                               name="fin_sele_alumnos"
                               value="{{ old('fin_sele_alumnos', $periodoEscolar->fin_sele_alumnos?->format('Y-m-d')) }}">
                        @error('fin_sele_alumnos')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Calificación Docentes -->
                    <div class="col-md-6">
                        <label for="inicio_cal_docentes" class="form-label">Inicio Calificación Docentes</label>
                        <input type="date"
                               class="form-control @error('inicio_cal_docentes') is-invalid @enderror"
                               id="inicio_cal_docentes"
                               name="inicio_cal_docentes"
                               value="{{ old('inicio_cal_docentes', $periodoEscolar->inicio_cal_docentes?->format('Y-m-d')) }}">
                        @error('inicio_cal_docentes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="fin_cal_docentes" class="form-label">Fin Calificación Docentes</label>
                        <input type="date"
                               class="form-control @error('fin_cal_docentes') is-invalid @enderror"
                               id="fin_cal_docentes"
                               name="fin_cal_docentes"
                               value="{{ old('fin_cal_docentes', $periodoEscolar->fin_cal_docentes?->format('Y-m-d')) }}">
                        @error('fin_cal_docentes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Notas -->
        <div class="card mt-4">
            <div class="card-header" style="background-color: #6c757d; color: white;">
                <h5 class="mb-0">Notas y Observaciones</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <!-- Nota Responsable -->
                    <div class="col-md-12">
                        <label for="nota_resp" class="form-label">Nota Responsable</label>
                        <input type="text"
                               class="form-control @error('nota_resp') is-invalid @enderror"
                               id="nota_resp"
                               name="nota_resp"
                               value="{{ old('nota_resp', $periodoEscolar->nota_resp) }}"
                               maxlength="500">
                        @error('nota_resp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Máximo 500 caracteres</small>
                    </div>

                    <!-- Nota General -->
                    <div class="col-md-12">
                        <label for="nota" class="form-label">Nota General</label>
                        <textarea class="form-control @error('nota') is-invalid @enderror"
                                  id="nota"
                                  name="nota"
                                  rows="4">{{ old('nota', $periodoEscolar->nota) }}</textarea>
                        @error('nota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Información de Auditoría -->
        <div class="card mt-4">
            <div class="card-header" style="background-color: #e9ecef;">
                <h5 class="mb-0">Información de Auditoría</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Fecha de Creación:</strong></p>
                        <p class="text-muted">{{ $periodoEscolar->created_at?->format('d/m/Y H:i:s') ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Última Actualización:</strong></p>
                        <p class="text-muted">{{ $periodoEscolar->updated_at?->format('d/m/Y H:i:s') ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botones de Acción -->
        <div class="card mt-4 mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="{{ route('periodos-escolares.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Cancelar
                        </a>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('periodos-escolares.show', $periodoEscolar->periodo) }}" class="btn btn-info">
                            <i class="bi bi-eye"></i> Ver Detalles
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Actualizar Período Escolar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script>
// Validación de fechas en tiempo real
document.addEventListener('DOMContentLoaded', function() {
    // Auto-hide alerts
    setTimeout(function() {
        var alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            var bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);

    // Validación de fecha término mayor que fecha inicio
    const fechaInicio = document.getElementById('fecha_inicio');
    const fechaTermino = document.getElementById('fecha_termino');

    if (fechaInicio && fechaTermino) {
        fechaInicio.addEventListener('change', function() {
            fechaTermino.min = this.value;
        });

        // Establecer min inicial si ya hay fecha de inicio
        if (fechaInicio.value) {
            fechaTermino.min = fechaInicio.value;
        }
    }
});
</script>
@endsection
