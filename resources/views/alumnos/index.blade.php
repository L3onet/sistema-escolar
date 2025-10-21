@extends('layouts.app2')

@section('title', 'Alumnos - Sistema Académico')

@section('content')
<div class="container-fluid">
    <!-- Encabezado -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>
                    <i class="bi bi-people-fill"></i> Gestión de Alumnos
                </h2>
                <a href="{{ route('alumnos.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Nuevo Alumno
                </a>
            </div>
        </div>
    </div>

    <!-- Formulario de Búsqueda y Filtros -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="bi bi-search"></i> Búsqueda y Filtros
            </h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('alumnos.index') }}" id="searchForm">
                <div class="row g-3">
                    <!-- Número de Control -->
                    <div class="col-md-3">
                        <label for="no_de_control" class="form-label">Número de Control</label>
                        <input type="text" 
                               class="form-control" 
                               id="no_de_control" 
                               name="no_de_control" 
                               value="{{ request('no_de_control') }}"
                               placeholder="Ej: 20401234">
                    </div>

                    <!-- Nombre -->
                    <div class="col-md-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" 
                               class="form-control" 
                               id="nombre" 
                               name="nombre" 
                               value="{{ request('nombre') }}"
                               placeholder="Nombre completo">
                    </div>

                    <!-- Carrera -->
                    <div class="col-md-2">
                        <label for="carrera" class="form-label">Carrera</label>
                        <select class="form-select" id="carrera" name="carrera">
                            <option value="">Todas</option>
                            @foreach($carreras as $carrera)
                                <option value="{{ $carrera }}" {{ request('carrera') == $carrera ? 'selected' : '' }}>
                                    {{ $carrera }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Semestre -->
                    <div class="col-md-2">
                        <label for="semestre" class="form-label">Semestre</label>
                        <select class="form-select" id="semestre" name="semestre">
                            <option value="">Todos</option>
                            @foreach($semestres as $semestre)
                                <option value="{{ $semestre }}" {{ request('semestre') == $semestre ? 'selected' : '' }}>
                                    {{ $semestre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Estatus -->
                    <div class="col-md-2">
                        <label for="estatus_alumno" class="form-label">Estatus</label>
                        <select class="form-select" id="estatus_alumno" name="estatus_alumno">
                            <option value="">Todos</option>
                            @foreach($estatuses as $estatus)
                                <option value="{{ $estatus }}" {{ request('estatus_alumno') == $estatus ? 'selected' : '' }}>
                                    {{ $estatus }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- CURP -->
                    <div class="col-md-3">
                        <label for="curp_alumno" class="form-label">CURP</label>
                        <input type="text" 
                               class="form-control" 
                               id="curp_alumno" 
                               name="curp_alumno" 
                               value="{{ request('curp_alumno') }}"
                               placeholder="CURP del alumno">
                    </div>

                    <!-- Plan de Estudios -->
                    <div class="col-md-2">
                        <label for="plan_de_estudios" class="form-label">Plan de Estudios</label>
                        <input type="text" 
                               class="form-control" 
                               id="plan_de_estudios" 
                               name="plan_de_estudios" 
                               value="{{ request('plan_de_estudios') }}"
                               placeholder="Plan">
                    </div>

                    <!-- Especialidad -->
                    <div class="col-md-2">
                        <label for="especialidad" class="form-label">Especialidad</label>
                        <input type="text" 
                               class="form-control" 
                               id="especialidad" 
                               name="especialidad" 
                               value="{{ request('especialidad') }}"
                               placeholder="Especialidad">
                    </div>

                    <!-- Periodo de Ingreso -->
                    <div class="col-md-3">
                        <label for="periodo_ingreso_it" class="form-label">Periodo de Ingreso</label>
                        <input type="text" 
                               class="form-control" 
                               id="periodo_ingreso_it" 
                               name="periodo_ingreso_it" 
                               value="{{ request('periodo_ingreso_it') }}"
                               placeholder="Ej: 20241">
                    </div>

                    <!-- Registros por página -->
                    <div class="col-md-2">
                        <label for="per_page" class="form-label">Mostrar</label>
                        <select class="form-select" id="per_page" name="per_page">
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="15" {{ request('per_page', 15) == 15 ? 'selected' : '' }}>15</option>
                            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Buscar
                        </button>
                        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Limpiar Filtros
                        </a>
                        <button type="button" class="btn btn-success" onclick="exportData()">
                            <i class="bi bi-file-earmark-excel"></i> Exportar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Resultados -->
    <div class="card">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="bi bi-table"></i> Listado de Alumnos
            </h5>
            <span class="badge bg-light text-dark">
                Total: {{ $alumnos->total() }} registros
            </span>
        </div>
        <div class="card-body p-0">
            @if($alumnos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>
                                    <a href="{{ route('alumnos.index', array_merge(request()->all(), ['sort_by' => 'no_de_control', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc'])) }}" 
                                       class="text-white text-decoration-none">
                                        No. Control
                                        @if(request('sort_by') == 'no_de_control')
                                            <i class="bi bi-arrow-{{ request('sort_order') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('alumnos.index', array_merge(request()->all(), ['sort_by' => 'apellido_paterno', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc'])) }}" 
                                       class="text-white text-decoration-none">
                                        Nombre Completo
                                        @if(request('sort_by') == 'apellido_paterno')
                                            <i class="bi bi-arrow-{{ request('sort_order') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('alumnos.index', array_merge(request()->all(), ['sort_by' => 'carrera', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc'])) }}" 
                                       class="text-white text-decoration-none">
                                        Carrera
                                        @if(request('sort_by') == 'carrera')
                                            <i class="bi bi-arrow-{{ request('sort_order') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('alumnos.index', array_merge(request()->all(), ['sort_by' => 'semestre', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc'])) }}" 
                                       class="text-white text-decoration-none">
                                        Semestre
                                        @if(request('sort_by') == 'semestre')
                                            <i class="bi bi-arrow-{{ request('sort_order') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('alumnos.index', array_merge(request()->all(), ['sort_by' => 'promedio_aritmetico_acumulado', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc'])) }}" 
                                       class="text-white text-decoration-none">
                                        Promedio
                                        @if(request('sort_by') == 'promedio_aritmetico_acumulado')
                                            <i class="bi bi-arrow-{{ request('sort_order') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Estatus</th>
                                <th>Correo Electrónico</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alumnos as $alumno)
                                <tr>
                                    <td><strong>{{ $alumno->no_de_control }}</strong></td>
                                    <td>
                                        {{ $alumno->apellido_paterno }} 
                                        {{ $alumno->apellido_materno }} 
                                        {{ $alumno->nombre_alumno }}
                                    </td>
                                    <td>{{ $alumno->carrera ?? 'N/A' }}</td>
                                    <td>{{ $alumno->semestre ?? 'N/A' }}</td>
                                    <td>
                                        @if($alumno->promedio_aritmetico_acumulado)
                                            <span class="badge bg-{{ $alumno->promedio_aritmetico_acumulado >= 80 ? 'success' : ($alumno->promedio_aritmetico_acumulado >= 70 ? 'warning' : 'danger') }}">
                                                {{ number_format($alumno->promedio_aritmetico_acumulado, 2) }}
                                            </span>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($alumno->estatus_alumno == 'ACT')
                                            <span class="badge bg-success">Activo</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $alumno->estatus_alumno }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $alumno->correo_electronico ?? 'N/A' }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('alumnos.show', $alumno->no_de_control) }}" 
                                               class="btn btn-sm btn-info" 
                                               title="Ver detalles">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('alumnos.edit', $alumno->no_de_control) }}" 
                                               class="btn btn-sm btn-warning" 
                                               title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('alumnos.destroy', $alumno->no_de_control) }}" 
                                                  method="POST" 
                                                  class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-danger" 
                                                        title="Eliminar">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            Mostrando {{ $alumnos->firstItem() }} a {{ $alumnos->lastItem() }} de {{ $alumnos->total() }} registros
                        </div>
                        <div>
                            {{ $alumnos->links() }}
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-info m-3">
                    <i class="bi bi-info-circle"></i> No se encontraron alumnos con los criterios de búsqueda especificados.
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    function exportData() {
        const params = new URLSearchParams(window.location.search);
        window.location.href = '{{ route("alumnos.export") }}?' + params.toString();
    }
</script>
@endpush
@endsection