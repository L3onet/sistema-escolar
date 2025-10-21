@extends('layouts.app2')

@section('title', 'Períodos Escolares')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Períodos Escolares</h1>
        <a href="{{ route('periodos-escolares.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nuevo Período
        </a>
    </div>

    <!-- Alertas -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Filtros y Búsqueda -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('periodos-escolares.index') }}" class="row g-3">
                <!-- Búsqueda -->
                <div class="col-md-4">
                    <label for="search" class="form-label">Buscar</label>
                    <input type="text" class="form-control" id="search" name="search" 
                           placeholder="Período, identificación..." 
                           value="{{ request('search') }}">
                </div>

                <!-- Filtro por Status -->
                <div class="col-md-2">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="">Todos</option>
                        <option value="A" {{ request('status') == 'A' ? 'selected' : '' }}>Activo</option>
                        <option value="I" {{ request('status') == 'I' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>

                <!-- Fecha Inicio -->
                <div class="col-md-2">
                    <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" 
                           value="{{ request('fecha_inicio') }}">
                </div>

                <!-- Fecha Término -->
                <div class="col-md-2">
                    <label for="fecha_termino" class="form-label">Fecha Término</label>
                    <input type="date" class="form-control" id="fecha_termino" name="fecha_termino" 
                           value="{{ request('fecha_termino') }}">
                </div>

                <!-- Botones -->
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">Buscar</button>
                    <a href="{{ route('periodos-escolares.index') }}" class="btn btn-secondary">Limpiar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabla de Períodos -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>
                                <a href="{{ route('periodos-escolares.index', array_merge(request()->all(), ['sort_by' => 'periodo', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc'])) }}" 
                                   class="text-white text-decoration-none">
                                    Período
                                    @if(request('sort_by') == 'periodo')
                                        <span>{{ request('sort_order') == 'asc' ? '▲' : '▼' }}</span>
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('periodos-escolares.index', array_merge(request()->all(), ['sort_by' => 'identificacion_larga', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc'])) }}" 
                                   class="text-white text-decoration-none">
                                    Identificación Larga
                                    @if(request('sort_by') == 'identificacion_larga')
                                        <span>{{ request('sort_order') == 'asc' ? '▲' : '▼' }}</span>
                                    @endif
                                </a>
                            </th>
                            <th>Identificación Corta</th>
                            <th>
                                <a href="{{ route('periodos-escolares.index', array_merge(request()->all(), ['sort_by' => 'status', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc'])) }}" 
                                   class="text-white text-decoration-none">
                                    Status
                                    @if(request('sort_by') == 'status')
                                        <span>{{ request('sort_order') == 'asc' ? '▲' : '▼' }}</span>
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('periodos-escolares.index', array_merge(request()->all(), ['sort_by' => 'fecha_inicio', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc'])) }}" 
                                   class="text-white text-decoration-none">
                                    Fecha Inicio
                                    @if(request('sort_by') == 'fecha_inicio')
                                        <span>{{ request('sort_order') == 'asc' ? '▲' : '▼' }}</span>
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('periodos-escolares.index', array_merge(request()->all(), ['sort_by' => 'fecha_termino', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc'])) }}" 
                                   class="text-white text-decoration-none">
                                    Fecha Término
                                    @if(request('sort_by') == 'fecha_termino')
                                        <span>{{ request('sort_order') == 'asc' ? '▲' : '▼' }}</span>
                                    @endif
                                </a>
                            </th>
                            <th>Días Clase</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($periodos as $periodo)
                        <tr>
                            <td><strong>{{ $periodo->periodo }}</strong></td>
                            <td>{{ $periodo->identificacion_larga }}</td>
                            <td>{{ $periodo->identificacion_corta }}</td>
                            <td>
                                @if($periodo->status == 'A')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($periodo->fecha_inicio)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($periodo->fecha_termino)->format('d/m/Y') }}</td>
                            <td>{{ $periodo->num_dias_clase }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('periodos-escolares.show', $periodo->periodo) }}" 
                                       class="btn btn-sm btn-info" 
                                       title="Ver detalles">
                                        <i class="bi bi-eye"></i> Ver
                                    </a>
                                    <a href="{{ route('periodos-escolares.edit', $periodo->periodo) }}" 
                                       class="btn btn-sm btn-warning" 
                                       title="Editar">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="confirmarEliminar('{{ $periodo->periodo }}')"
                                            title="Eliminar">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <p class="text-muted mb-0">No se encontraron períodos escolares.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                    <p class="text-muted mb-0">
                        Mostrando {{ $periodos->firstItem() ?? 0 }} a {{ $periodos->lastItem() ?? 0 }} 
                        de {{ $periodos->total() }} registros
                    </p>
                </div>
                <div>
                    {{ $periodos->appends(request()->query())->links('pagination::bootstrap-5') }}
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
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea eliminar el período escolar <strong id="periodoName"></strong>?
                <p class="text-danger mt-2 mb-0">Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script>
function confirmarEliminar(periodo) {
    document.getElementById('periodoName').textContent = periodo;
    document.getElementById('deleteForm').action = `/periodos-escolares/${periodo}`;
    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
}

// Auto-hide alerts después de 5 segundos
setTimeout(function() {
    var alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        var bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    });
}, 5000);
</script>
@endsection