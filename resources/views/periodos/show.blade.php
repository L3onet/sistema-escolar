@extends('layouts.app3')

@section('title', 'Detalles del Período Escolar')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">
            <i class="bi bi-calendar-event"></i> Detalles del Período Escolar
        </h1>
        <div class="btn-group" role="group">
            <a href="{{ route('periodos-escolares.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver al Listado
            </a>
            <a href="{{ route('periodos-escolares.edit', $periodoEscolar->periodo) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Editar
            </a>
            <button type="button"
                    class="btn btn-danger"
                    onclick="confirmarEliminar('{{ $periodoEscolar->periodo }}')">
                <i class="bi bi-trash"></i> Eliminar
            </button>
        </div>
    </div>

    <!-- Información General -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-info-circle"></i> Información General</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h6 class="text-muted mb-2">Período</h6>
                    <p class="h4 text-primary mb-3">
                        <i class="bi bi-calendar-check"></i> {{ $periodoEscolar->periodo }}
                    </p>
                </div>
                <div class="col-md-3">
                    <h6 class="text-muted mb-2">Status</h6>
                    <p class="mb-3">
                        @if($periodoEscolar->status == 'A')
                            <span class="badge bg-success fs-6">
                                <i class="bi bi-check-circle"></i> Activo
                            </span>
                        @else
                            <span class="badge bg-secondary fs-6">
                                <i class="bi bi-x-circle"></i> Inactivo
                            </span>
                        @endif
                    </p>
                </div>
                <div class="col-md-3">
                    <h6 class="text-muted mb-2">Días de Clase</h6>
                    <p class="h5 mb-3">
                        <i class="bi bi-calendar3"></i> {{ $periodoEscolar->num_dias_clase }} días
                    </p>
                </div>
                <div class="col-md-3">
                    <h6 class="text-muted mb-2">Filtro</h6>
                    <p class="mb-3">
                        <span class="badge bg-info fs-6">{{ $periodoEscolar->filtro ?? 'N/A' }}</span>
                    </p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Identificación Larga</h6>
                    <p class="mb-3">{{ $periodoEscolar->identificacion_larga }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Identificación Corta</h6>
                    <p class="mb-3">{{ $periodoEscolar->identificacion_corta }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Cierre de Horarios</h6>
                    <p class="mb-3">
                        @if($periodoEscolar->cierre_horarios == 'S')
                            <span class="badge bg-danger"><i class="bi bi-lock-fill"></i> Cerrado</span>
                        @else
                            <span class="badge bg-success"><i class="bi bi-unlock-fill"></i> Abierto</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Cierre de Selección</h6>
                    <p class="mb-3">
                        @if($periodoEscolar->cierre_seleccion == 'S')
                            <span class="badge bg-danger"><i class="bi bi-lock-fill"></i> Cerrado</span>
                        @else
                            <span class="badge bg-success"><i class="bi bi-unlock-fill"></i> Abierto</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Fechas del Período -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0"><i class="bi bi-calendar-range"></i> Fechas del Período</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="bi bi-calendar-event text-primary" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Fecha de Inicio</h6>
                            <p class="h5 mb-0">{{ $periodoEscolar->fecha_inicio?->format('d/m/Y') ?? 'N/A' }}</p>
                            <small class="text-muted">{{ $periodoEscolar->fecha_inicio?->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="bi bi-calendar-check text-success" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Fecha de Término</h6>
                            <p class="h5 mb-0">{{ $periodoEscolar->fecha_termino?->format('d/m/Y') ?? 'N/A' }}</p>
                            <small class="text-muted">{{ $periodoEscolar->fecha_termino?->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @if($periodoEscolar->fecha_inicio && $periodoEscolar->fecha_termino)
            <div class="alert alert-info mt-3 mb-0">
                <i class="bi bi-info-circle"></i>
                <strong>Duración del período:</strong>
                {{ $periodoEscolar->fecha_inicio->diffInDays($periodoEscolar->fecha_termino) }} días
                ({{ $periodoEscolar->fecha_inicio->diffInWeeks($periodoEscolar->fecha_termino) }} semanas aproximadamente)
            </div>
            @endif
        </div>
    </div>

    <!-- Períodos Vacacionales -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="bi bi-sun"></i> Períodos Vacacionales</h5>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h6 class="text-primary"><i class="bi bi-calendar2-week"></i> Período Vacacional SS</h6>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Inicio</h6>
                    <p class="mb-0"><i class="bi bi-calendar-event"></i> {{ $periodoEscolar->inicio_vacacional_ss?->format('d/m/Y') ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Término</h6>
                    <p class="mb-0"><i class="bi bi-calendar-check"></i> {{ $periodoEscolar->termino_vacacional_ss?->format('d/m/Y') ?? 'N/A' }}</p>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-md-12">
                    <h6 class="text-primary"><i class="bi bi-calendar2-week"></i> Período Vacacional General</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Inicio</h6>
                    <p class="mb-0"><i class="bi bi-calendar-event"></i> {{ $periodoEscolar->inicio_vacacional?->format('d/m/Y') ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Término</h6>
                    <p class="mb-0"><i class="bi bi-calendar-check"></i> {{ $periodoEscolar->termino_vacacional?->format('d/m/Y') ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Período Especial -->
    @if($periodoEscolar->inicio_especial || $periodoEscolar->fin_especial)
    <div class="card mb-4">
        <div class="card-header bg-warning">
            <h5 class="mb-0"><i class="bi bi-star"></i> Período Especial</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Inicio</h6>
                    <p class="mb-0"><i class="bi bi-calendar-event"></i> {{ $periodoEscolar->inicio_especial?->format('d/m/Y') ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Fin</h6>
                    <p class="mb-0"><i class="bi bi-calendar-check"></i> {{ $periodoEscolar->fin_especial?->format('d/m/Y') ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Períodos de Parciales -->
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0"><i class="bi bi-journal-text"></i> Períodos de Evaluación Parcial</h5>
        </div>
        <div class="card-body">
            <!-- Parcial 1 -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <h6 class="text-primary">
                        <i class="bi bi-1-circle-fill"></i> Primer Parcial
                    </h6>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Inicio</h6>
                    <p class="mb-0">
                        @if($periodoEscolar->parcial1_inicio)
                            <i class="bi bi-calendar-event"></i> {{ $periodoEscolar->parcial1_inicio->format('d/m/Y') }}
                        @else
                            <span class="text-muted">No definido</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Fin</h6>
                    <p class="mb-0">
                        @if($periodoEscolar->parcial1_fin)
                            <i class="bi bi-calendar-check"></i> {{ $periodoEscolar->parcial1_fin->format('d/m/Y') }}
                        @else
                            <span class="text-muted">No definido</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Parcial 2 -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <h6 class="text-primary">
                        <i class="bi bi-2-circle-fill"></i> Segundo Parcial
                    </h6>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Inicio</h6>
                    <p class="mb-0">
                        @if($periodoEscolar->parcial2_inicio)
                            <i class="bi bi-calendar-event"></i> {{ $periodoEscolar->parcial2_inicio->format('d/m/Y') }}
                        @else
                            <span class="text-muted">No definido</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Fin</h6>
                    <p class="mb-0">
                        @if($periodoEscolar->parcial2_fin)
                            <i class="bi bi-calendar-check"></i> {{ $periodoEscolar->parcial2_fin->format('d/m/Y') }}
                        @else
                            <span class="text-muted">No definido</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Parcial 3 -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <h6 class="text-primary">
                        <i class="bi bi-3-circle-fill"></i> Tercer Parcial
                    </h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Inicio</h6>
                    <p class="mb-0">
                        @if($periodoEscolar->parcial3_inicio)
                            <i class="bi bi-calendar-event"></i> {{ $periodoEscolar->parcial3_inicio->format('d/m/Y') }}
                        @else
                            <span class="text-muted">No definido</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Fin</h6>
                    <p class="mb-0">
                        @if($periodoEscolar->parcial3_fin)
                            <i class="bi bi-calendar-check"></i> {{ $periodoEscolar->parcial3_fin->format('d/m/Y') }}
                        @else
                            <span class="text-muted">No definido</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Encuestas y Selección -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0"><i class="bi bi-clipboard-check"></i> Encuestas y Selección de Alumnos</h5>
        </div>
        <div class="card-body">
            <!-- Encuesta Estudiantil -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <h6 class="text-primary"><i class="bi bi-file-earmark-text"></i> Encuesta Estudiantil</h6>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Inicio</h6>
                    <p class="mb-0">
                        @if($periodoEscolar->inicio_enc_estudiantil)
                            <i class="bi bi-calendar-event"></i> {{ $periodoEscolar->inicio_enc_estudiantil->format('d/m/Y') }}
                        @else
                            <span class="text-muted">No definido</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Fin</h6>
                    <p class="mb-0">
                        @if($periodoEscolar->fin_enc_estudiantil)
                            <i class="bi bi-calendar-check"></i> {{ $periodoEscolar->fin_enc_estudiantil->format('d/m/Y') }}
                        @else
                            <span class="text-muted">No definido</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Selección de Alumnos -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <h6 class="text-primary"><i class="bi bi-people"></i> Selección de Alumnos</h6>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Inicio</h6>
                    <p class="mb-0">
                        @if($periodoEscolar->inicio_sele_alumnos)
                            <i class="bi bi-calendar-event"></i> {{ $periodoEscolar->inicio_sele_alumnos->format('d/m/Y') }}
                        @else
                            <span class="text-muted">No definido</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Fin</h6>
                    <p class="mb-0">
                        @if($periodoEscolar->fin_sele_alumnos)
                            <i class="bi bi-calendar-check"></i> {{ $periodoEscolar->fin_sele_alumnos->format('d/m/Y') }}
                        @else
                            <span class="text-muted">No definido</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Calificación Docentes -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <h6 class="text-primary"><i class="bi bi-person-check"></i> Calificación de Docentes</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Inicio</h6>
                    <p class="mb-0">
                        @if($periodoEscolar->inicio_cal_docentes)
                            <i class="bi bi-calendar-event"></i> {{ $periodoEscolar->inicio_cal_docentes->format('d/m/Y') }}
                        @else
                            <span class="text-muted">No definido</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-muted mb-2">Fin</h6>
                    <p class="mb-0">
                        @if($periodoEscolar->fin_cal_docentes)
                            <i class="bi bi-calendar-check"></i> {{ $periodoEscolar->fin_cal_docentes->format('d/m/Y') }}
                        @else
                            <span class="text-muted">No definido</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Notas y Observaciones -->
    @if($periodoEscolar->nota_resp || $periodoEscolar->nota)
    <div class="card mb-4">
        <div class="card-header" style="background-color: #6c757d; color: white;">
            <h5 class="mb-0"><i class="bi bi-journal-text"></i> Notas y Observaciones</h5>
        </div>
        <div class="card-body">
            @if($periodoEscolar->nota_resp)
            <div class="mb-3">
                <h6 class="text-muted mb-2">
                    <i class="bi bi-person-badge"></i> Nota del Responsable
                </h6>
                <div class="alert alert-info mb-0">
                    <p class="mb-0">{{ $periodoEscolar->nota_resp }}</p>
                </div>
            </div>
            @endif

            @if($periodoEscolar->nota)
            <div>
                <h6 class="text-muted mb-2">
                    <i class="bi bi-sticky"></i> Nota General
                </h6>
                <div class="card bg-light">
                    <div class="card-body">
                        <p class="mb-0" style="white-space: pre-line;">{{ $periodoEscolar->nota }}</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endif

    <!-- Información de Auditoría -->
    <div class="card mb-4">
        <div class="card-header" style="background-color: #e9ecef;">
            <h5 class="mb-0"><i class="bi bi-clock-history"></i> Información de Auditoría</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="bi bi-plus-circle text-success" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Fecha de Creación</h6>
                            <p class="mb-0">
                                @if($periodoEscolar->created_at)
                                    {{ $periodoEscolar->created_at->format('d/m/Y H:i:s') }}
                                    <br>
                                    <small class="text-muted">
                                        ({{ $periodoEscolar->created_at->diffForHumans() }})
                                    </small>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="bi bi-pencil-square text-warning" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Última Actualización</h6>
                            <p class="mb-0">
                                @if($periodoEscolar->updated_at)
                                    {{ $periodoEscolar->updated_at->format('d/m/Y H:i:s') }}
                                    <br>
                                    <small class="text-muted">
                                        ({{ $periodoEscolar->updated_at->diffForHumans() }})
                                    </small>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Acciones Rápidas -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('periodos-escolares.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver al Listado
                </a>
                <div class="btn-group" role="group">
                    <a href="{{ route('periodos-escolares.edit', $periodoEscolar->periodo) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                    <button type="button"
                            class="btn btn-danger"
                            onclick="confirmarEliminar('{{ $periodoEscolar->periodo }}')">
                        <i class="bi bi-trash"></i> Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmación para Eliminar -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="bi bi-exclamation-triangle"></i> Confirmar Eliminación
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro que desea eliminar el período escolar <strong>{{ $periodoEscolar->periodo }}</strong>?</p>
                <div class="alert alert-warning mb-0">
                    <i class="bi bi-exclamation-triangle"></i>
                    <strong>Advertencia:</strong> Esta acción no se puede deshacer.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Cancelar
                </button>
                <form id="deleteForm" action="{{ route('periodos-escolares.destroy', $periodoEscolar->periodo) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script>
function confirmarEliminar(periodo) {
    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
}

// Auto-hide alerts después de 5 segundos
setTimeout(function() {
    var alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        if (!alert.classList.contains('alert-info') && !alert.classList.contains('alert-warning')) {
            var bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    });
}, 5000);
</script>
@endsection
