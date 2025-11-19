@extends('layouts.app3')

@section('title', 'Detalles del Alumno - Sistema Académico')

@section('content')
<div class="container">
    <!-- Encabezado -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>
                    <i class="bi bi-person-badge-fill"></i> Detalles del Alumno
                </h2>
                <div>
                    <a href="{{ route('alumnos.edit', $alumno->no_de_control) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver al Listado
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjeta Principal con Foto y Datos Básicos -->
    <div class="card mb-4 shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    <!-- Foto del alumno (placeholder) -->
                    <div class="mb-3">
                        @if($alumno->sexo == 'M')
                            <i class="bi bi-person-circle" style="font-size: 150px; color: #0d6efd;"></i>
                        @elseif($alumno->sexo == 'F')
                            <i class="bi bi-person-circle" style="font-size: 150px; color: #d63384;"></i>
                        @else
                            <i class="bi bi-person-circle" style="font-size: 150px; color: #6c757d;"></i>
                        @endif
                    </div>

                    <!-- Estatus del Alumno -->
                    <div class="mb-2">
                        @if($alumno->estatus_alumno == 'ACT')
                            <span class="badge bg-success fs-5">
                                <i class="bi bi-check-circle"></i> ACTIVO
                            </span>
                        @elseif($alumno->estatus_alumno == 'INA')
                            <span class="badge bg-secondary fs-5">
                                <i class="bi bi-pause-circle"></i> INACTIVO
                            </span>
                        @elseif($alumno->estatus_alumno == 'BAJ')
                            <span class="badge bg-danger fs-5">
                                <i class="bi bi-x-circle"></i> BAJA
                            </span>
                        @elseif($alumno->estatus_alumno == 'EGR')
                            <span class="badge bg-info fs-5">
                                <i class="bi bi-mortarboard"></i> EGRESADO
                            </span>
                        @elseif($alumno->estatus_alumno == 'TIT')
                            <span class="badge bg-primary fs-5">
                                <i class="bi bi-trophy"></i> TITULADO
                            </span>
                        @else
                            <span class="badge bg-secondary fs-5">{{ $alumno->estatus_alumno }}</span>
                        @endif
                    </div>

                    <!-- QR Code o Código de barras (placeholder) -->
                    <div class="mt-3 p-3 border rounded">
                        <small class="text-muted d-block">Código QR</small>
                        <i class="bi bi-qr-code" style="font-size: 80px;"></i>
                    </div>
                </div>

                <div class="col-md-9">
                    <h3 class="text-primary mb-3">
                        {{ $alumno->nombre_alumno }} {{ $alumno->apellido_paterno }} {{ $alumno->apellido_materno }}
                    </h3>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="border-start border-primary border-4 ps-3">
                                <small class="text-muted">Número de Control</small>
                                <h5 class="mb-0">{{ $alumno->no_de_control }}</h5>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border-start border-success border-4 ps-3">
                                <small class="text-muted">Carrera</small>
                                <h5 class="mb-0">{{ $alumno->carrera ?? 'No especificada' }}</h5>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border-start border-info border-4 ps-3">
                                <small class="text-muted">CURP</small>
                                <h5 class="mb-0">{{ $alumno->curp_alumno ?? 'No registrado' }}</h5>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border-start border-warning border-4 ps-3">
                                <small class="text-muted">Correo Electrónico</small>
                                <h5 class="mb-0">
                                    @if($alumno->correo_electronico)
                                        <a href="mailto:{{ $alumno->correo_electronico }}">
                                            {{ $alumno->correo_electronico }}
                                        </a>
                                    @else
                                        No registrado
                                    @endif
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Información Personal -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="bi bi-person-lines-fill"></i> Información Personal
            </h5>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-4">
                    <strong><i class="bi bi-calendar-event"></i> Fecha de Nacimiento:</strong>
                    <p class="mb-0">{{ $alumno->fecha_nacimiento?->format('d/m/Y') ?? 'No registrada' }}</p>
                </div>

                <div class="col-md-4">
                    <strong><i class="bi bi-gender-ambiguous"></i> Sexo:</strong>
                    <p class="mb-0">
                        @if($alumno->sexo == 'M')
                            Masculino
                        @elseif($alumno->sexo == 'F')
                            Femenino
                        @else
                            No especificado
                        @endif
                    </p>
                </div>

                <div class="col-md-4">
                    <strong><i class="bi bi-heart"></i> Estado Civil:</strong>
                    <p class="mb-0">
                        @if($alumno->estado_civil == 'S')
                            Soltero(a)
                        @elseif($alumno->estado_civil == 'C')
                            Casado(a)
                        @elseif($alumno->estado_civil == 'D')
                            Divorciado(a)
                        @elseif($alumno->estado_civil == 'V')
                            Viudo(a)
                        @elseif($alumno->estado_civil == 'U')
                            Unión Libre
                        @else
                            No especificado
                        @endif
                    </p>
                </div>

                <div class="col-md-4">
                    <strong><i class="bi bi-flag"></i> Nacionalidad:</strong>
                    <p class="mb-0">{{ $alumno->nacionalidad ?? 'No especificada' }}</p>
                </div>

                <div class="col-md-4">
                    <strong><i class="bi bi-hospital"></i> Servicio Médico:</strong>
                    <p class="mb-0">
                        @if($alumno->tipo_servicio_medico == 'I')
                            IMSS
                        @elseif($alumno->tipo_servicio_medico == 'S')
                            ISSSTE
                        @elseif($alumno->tipo_servicio_medico == 'P')
                            Privado
                        @elseif($alumno->tipo_servicio_medico == 'N')
                            Ninguno
                        @else
                            No especificado
                        @endif
                    </p>
                </div>

                <div class="col-md-4">
                    <strong><i class="bi bi-credit-card"></i> Clave de Servicio Médico:</strong>
                    <p class="mb-0">{{ $alumno->clave_servicio_medico ?? 'No registrada' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Información Académica -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">
                <i class="bi bi-mortarboard-fill"></i> Información Académica
            </h5>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-3">
                    <strong><i class="bi bi-bookmark"></i> Carrera:</strong>
                    <p class="mb-0">{{ $alumno->carrera ?? 'No especificada' }}</p>
                </div>

                <div class="col-md-3">
                    <strong><i class="bi bi-diagram-3"></i> Retícula:</strong>
                    <p class="mb-0">{{ $alumno->reticula ?? 'No especificada' }}</p>
                </div>

                <div class="col-md-3">
                    <strong><i class="bi bi-star"></i> Especialidad:</strong>
                    <p class="mb-0">{{ $alumno->especialidad ?? 'No especificada' }}</p>
                </div>

                <div class="col-md-3">
                    <strong><i class="bi bi-file-text"></i> Plan de Estudios:</strong>
                    <p class="mb-0">{{ $alumno->plan_de_estudios }}</p>
                </div>

                <div class="col-md-3">
                    <strong><i class="bi bi-ladder"></i> Nivel Escolar:</strong>
                    <p class="mb-0">
                        @if($alumno->nivel_escolar == 'L')
                            Licenciatura
                        @elseif($alumno->nivel_escolar == 'M')
                            Maestría
                        @elseif($alumno->nivel_escolar == 'D')
                            Doctorado
                        @else
                            No especificado
                        @endif
                    </p>
                </div>

                <div class="col-md-3">
                    <strong><i class="bi bi-123"></i> Semestre:</strong>
                    <p class="mb-0">{{ $alumno->semestre ?? 'No especificado' }}</p>
                </div>

                <div class="col-md-3">
                    <strong><i class="bi bi-arrow-right-circle"></i> Tipo de Ingreso:</strong>
                    <p class="mb-0">
                        @if($alumno->tipo_ingreso == 1)
                            Nuevo Ingreso
                        @elseif($alumno->tipo_ingreso == 2)
                            Reingreso
                        @elseif($alumno->tipo_ingreso == 3)
                            Transferencia
                        @elseif($alumno->tipo_ingreso == 4)
                            Equivalencia
                        @else
                            No especificado
                        @endif
                    </p>
                </div>

                <div class="col-md-3">
                    <strong><i class="bi bi-calendar-check"></i> Período de Ingreso:</strong>
                    <p class="mb-0">{{ $alumno->periodo_ingreso_it }}</p>
                </div>

                <div class="col-md-4">
                    <strong><i class="bi bi-calendar3"></i> Último Período Inscrito:</strong>
                    <p class="mb-0">{{ $alumno->ultimo_periodo_inscrito ?? 'No registrado' }}</p>
                </div>

                <div class="col-md-4">
                    <strong><i class="bi bi-person-badge"></i> Tipo de Alumno:</strong>
                    <p class="mb-0">{{ $alumno->tipo_alumno ?? 'No especificado' }}</p>
                </div>

                <div class="col-md-4">
                    <strong><i class="bi bi-key"></i> Clave Interna:</strong>
                    <p class="mb-0">{{ $alumno->clave_interna ?? 'No asignada' }}</p>
                </div>

                @if($alumno->becado_por)
                <div class="col-md-12">
                    <div class="alert alert-info mb-0">
                        <strong><i class="bi bi-award"></i> Becado Por:</strong> {{ $alumno->becado_por }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Rendimiento Académico -->
    <div class="card mb-4">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">
                <i class="bi bi-graph-up-arrow"></i> Rendimiento Académico
            </h5>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <!-- Promedios -->
                <div class="col-md-4">
                    <div class="card border-primary">
                        <div class="card-body text-center">
                            <small class="text-muted">Promedio Acumulado</small>
                            <h2 class="mb-0">
                                @if($alumno->promedio_aritmetico_acumulado)
                                    <span class="badge bg-{{ $alumno->promedio_aritmetico_acumulado >= 80 ? 'success' : ($alumno->promedio_aritmetico_acumulado >= 70 ? 'warning' : 'danger') }} fs-3">
                                        {{ number_format($alumno->promedio_aritmetico_acumulado, 2) }}
                                    </span>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-info">
                        <div class="card-body text-center">
                            <small class="text-muted">Promedio Período Anterior</small>
                            <h2 class="mb-0">
                                @if($alumno->promedio_periodo_anterior)
                                    <span class="badge bg-info fs-3">
                                        {{ number_format($alumno->promedio_periodo_anterior, 2) }}
                                    </span>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-success">
                        <div class="card-body text-center">
                            <small class="text-muted">Promedio Final Alcanzado</small>
                            <h2 class="mb-0">
                                @if($alumno->promedio_final_alcanzado)
                                    <span class="badge bg-success fs-3">
                                        {{ number_format($alumno->promedio_final_alcanzado, 2) }}
                                    </span>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>

                <!-- Créditos -->
                <div class="col-md-6">
                    <div class="card border-success">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted">Créditos Aprobados</small>
                                    <h3 class="mb-0 text-success">
                                        <i class="bi bi-check-circle"></i>
                                        {{ $alumno->creditos_aprobados ?? 0 }}
                                    </h3>
                                </div>
                                @if($alumno->creditos_aprobados && $alumno->creditos_cursados && $alumno->creditos_cursados > 0)
                                    <div class="text-end">
                                        <small class="text-muted">Avance</small>
                                        <h4 class="mb-0">
                                            {{ number_format(($alumno->creditos_aprobados / $alumno->creditos_cursados) * 100, 1) }}%
                                        </h4>
                                    </div>
                                @endif
                            </div>
                            @if($alumno->creditos_aprobados && $alumno->creditos_cursados && $alumno->creditos_cursados > 0)
                                <div class="progress mt-2" style="height: 25px;">
                                    <div class="progress-bar bg-success"
                                         role="progressbar"
                                         style="width: {{ ($alumno->creditos_aprobados / $alumno->creditos_cursados) * 100 }}%"
                                         aria-valuenow="{{ ($alumno->creditos_aprobados / $alumno->creditos_cursados) * 100 }}"
                                         aria-valuemin="0"
                                         aria-valuemax="100">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-primary">
                        <div class="card-body">
                            <small class="text-muted">Créditos Cursados</small>
                            <h3 class="mb-0 text-primary">
                                <i class="bi bi-journal-text"></i>
                                {{ $alumno->creditos_cursados ?? 0 }}
                            </h3>
                        </div>
                    </div>
                </div>

                <!-- Otros indicadores -->
                @if($alumno->indice_reprobacion_acumulado)
                <div class="col-md-6">
                    <div class="alert alert-{{ $alumno->indice_reprobacion_acumulado > 0.3 ? 'danger' : 'success' }} mb-0">
                        <strong><i class="bi bi-exclamation-triangle"></i> Índice de Reprobación:</strong>
                        {{ number_format($alumno->indice_reprobacion_acumulado * 100, 2) }}%
                    </div>
                </div>
                @endif

                @if($alumno->periodos_revalidacion)
                <div class="col-md-6">
                    <div class="alert alert-info mb-0">
                        <strong><i class="bi bi-arrow-repeat"></i> Períodos de Revalidación:</strong>
                        {{ $alumno->periodos_revalidacion }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Información de Procedencia -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">
                <i class="bi bi-building"></i> Información de Procedencia
            </h5>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <strong><i class="bi bi-bank"></i> Escuela de Procedencia:</strong>
                    <p class="mb-0">{{ $alumno->escuela_procedencia ?? 'No registrada' }}</p>
                </div>

                <div class="col-md-6">
                    <strong><i class="bi bi-building-check"></i> Tipo de Escuela:</strong>
                    <p class="mb-0">
                        @if($alumno->tipo_escuela == 1)
                            Pública
                        @elseif($alumno->tipo_escuela == 2)
                            Privada
                        @else
                            No especificado
                        @endif
                    </p>
                </div>

                <div class="col-md-6">
                    <strong><i class="bi bi-geo-alt"></i> Entidad de Procedencia:</strong>
                    <p class="mb-0">{{ $alumno->entidad_procedencia ?? 'No registrada' }}</p>
                </div>

                <div class="col-md-6">
                    <strong><i class="bi bi-pin-map"></i> Ciudad de Procedencia:</strong>
                    <p class="mb-0">{{ $alumno->ciudad_procedencia ?? 'No registrada' }}</p>
                </div>

                @if($alumno->domicilio_escuela)
                <div class="col-md-12">
                    <strong><i class="bi bi-house"></i> Domicilio de la Escuela:</strong>
                    <p class="mb-0">{{ $alumno->domicilio_escuela }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Información de Titulación -->
    @if($alumno->fecha_titulacion || $alumno->opcion_titulacion || $alumno->periodo_titulacion || $alumno->folio)
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">
                <i class="bi bi-trophy-fill"></i> Información de Titulación
            </h5>
        </div>
        <div class="card-body">
            <div class="row g-4">
                @if($alumno->fecha_titulacion)
                <div class="col-md-3">
                    <strong><i class="bi bi-calendar-event"></i> Fecha de Titulación:</strong>
                    <p class="mb-0">{{ $alumno->fecha_titulacion->format('d/m/Y') }}</p>
                </div>
                @endif

                @if($alumno->opcion_titulacion)
                <div class="col-md-3">
                    <strong><i class="bi bi-file-earmark-check"></i> Opción de Titulación:</strong>
                    <p class="mb-0">{{ $alumno->opcion_titulacion }}</p>
                </div>
                @endif

                @if($alumno->periodo_titulacion)
                <div class="col-md-3">
                    <strong><i class="bi bi-calendar3"></i> Período de Titulación:</strong>
                    <p class="mb-0">{{ $alumno->periodo_titulacion }}</p>
                </div>
                @endif

                @if($alumno->folio)
                <div class="col-md-3">
                    <strong><i class="bi bi-file-earmark-text"></i> Folio:</strong>
                    <p class="mb-0">{{ $alumno->folio }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endif

    <!-- Historial de Estatus -->
    @if($alumno->estatus_alumno_fecha || $alumno->estatus_alumno_usuario || $alumno->estatus_alumno_anterior)
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">
                <i class="bi bi-clock-history"></i> Historial de Cambios de Estatus
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Estatus Anterior</th>
                            <th>Estatus Actual</th>
                            <th>Fecha de Cambio</th>
                            <th>Usuario que Modificó</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                @if($alumno->estatus_alumno_anterior)
                                    <span class="badge bg-secondary">{{ $alumno->estatus_alumno_anterior }}</span>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($alumno->estatus_alumno == 'ACT')
                                    <span class="badge bg-success">ACTIVO</span>
                                @elseif($alumno->estatus_alumno == 'INA')
                                    <span class="badge bg-secondary">INACTIVO</span>
                                @elseif($alumno->estatus_alumno == 'BAJ')
                                    <span class="badge bg-danger">BAJA</span>
                                @elseif($alumno->estatus_alumno == 'EGR')
                                    <span class="badge bg-info">EGRESADO</span>
                                @elseif($alumno->estatus_alumno == 'TIT')
                                    <span class="badge bg-primary">TITULADO</span>
                                @else
                                    <span class="badge bg-secondary">{{ $alumno->estatus_alumno }}</span>
                                @endif
                            </td>
                            <td>{{ $alumno->estatus_alumno_fecha?->format('d/m/Y H:i:s') ?? 'N/A' }}</td>
                            <td>{{ $alumno->estatus_alumno_usuario ?? 'N/A' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    <!-- Información del Sistema -->
    <div class="card mb-4">
        <div class="card-header bg-light">
            <h6 class="mb-0 text-muted">
                <i class="bi bi-info-circle"></i> Información del Sistema
            </h6>
        </div>
        <div class="card-body bg-light">
            <div class="row">
                <div class="col-md-4">
                    <small class="text-muted">
                        <i class="bi bi-calendar-plus"></i>
                        <strong>Fecha de registro:</strong>
                    </small>
                    <p class="mb-0">{{ $alumno->created_at->format('d/m/Y H:i:s') }}</p>
                </div>
                <div class="col-md-4">
                    <small class="text-muted">
                        <i class="bi bi-calendar-check"></i>
                        <strong>Última actualización:</strong>
                    </small>
                    <p class="mb-0">{{ $alumno->updated_at->format('d/m/Y H:i:s') }}</p>
                </div>
                @if($alumno->usuario)
                <div class="col-md-4">
                    <small class="text-muted">
                        <i class="bi bi-person"></i>
                        <strong>Usuario:</strong>
                    </small>
                    <p class="mb-0">{{ $alumno->usuario }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Botones de Acción -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver al Listado
                </a>
                <div>
                    <button onclick="window.print()" class="btn btn-info">
                        <i class="bi bi-printer"></i> Imprimir
                    </button>
                    <a href="{{ route('alumnos.edit', $alumno->no_de_control) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Editar Alumno
                    </a>
                    <form action="{{ route('alumnos.destroy', $alumno->no_de_control) }}"
                          method="POST"
                          class="d-inline delete-form">
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
</div>

@push('scripts')
<script>
    // Estilos para impresión
    window.addEventListener('beforeprint', () => {
        document.querySelectorAll('.btn, .card-header, nav, footer').forEach(el => {
            el.style.display = 'none';
        });
    });

    window.addEventListener('afterprint', () => {
        document.querySelectorAll('.btn, .card-header, nav, footer').forEach(el => {
            el.style.display = '';
        });
    });
</script>
@endpush
@endsection
