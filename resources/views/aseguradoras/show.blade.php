@extends('layouts.app2')

@section('title', 'Detalle de Aseguradora')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Detalle de Aseguradora</h4>
                    <div>
                        <a href="{{ route('aseguradoras.edit', $aseguradora->clave_aseguradora) }}"
                           class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <a href="{{ route('aseguradoras.index') }}"
                           class="btn btn-sm btn-secondary">
                            <i class="bi bi-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="30%" class="bg-light">Clave Aseguradora</th>
                                <td>{{ $aseguradora->clave_aseguradora }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Nombre</th>
                                <td>{{ $aseguradora->nombre }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Fecha Inicial</th>
                                <td>
                                    {{ $aseguradora->fecha_inicial->format('d/m/Y H:i') }}
                                    <small class="text-muted">({{ $aseguradora->fecha_inicial->diffForHumans() }})</small>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">Fecha Final</th>
                                <td>
                                    {{ $aseguradora->fecha_final->format('d/m/Y H:i') }}
                                    <small class="text-muted">({{ $aseguradora->fecha_final->diffForHumans() }})</small>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">No. de Seguro</th>
                                <td>{{ $aseguradora->no_seguro }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Creado</th>
                                <td>{{ $aseguradora->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Última Actualización</th>
                                <td>{{ $aseguradora->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Botón de eliminar -->
                    <div class="mt-3">
                        <form action="{{ route('aseguradoras.destroy', $aseguradora->clave_aseguradora) }}"
                              method="POST"
                              onsubmit="return confirm('¿Está seguro de eliminar esta aseguradora?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Eliminar Aseguradora
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
