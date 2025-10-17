@extends('layouts.app2')

@section('title', 'Detalle de Unidad Temática')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Detalle de Unidad Temática</h4>
                    <div>
                        <a href="{{ route('unidades_tematicas.edit', [$unidad->no_de_unidad, $unidad->materia]) }}"
                           class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <a href="{{ route('unidades_tematicas.index') }}"
                           class="btn btn-sm btn-secondary">
                            <i class="bi bi-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th class="bg-light" width="40%">No. de Unidad</th>
                                        <td>
                                            <span class="badge bg-primary fs-6">{{ $unidad->no_de_unidad }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Materia</th>
                                        <td>
                                            <span class="badge bg-success fs-6">{{ $unidad->materia }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th class="bg-light" width="40%">Creado</th>
                                        <td>{{ $unidad->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Actualizado</th>
                                        <td>{{ $unidad->updated_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-3">
                        <h5 class="border-bottom pb-2">Nombre de la Unidad</h5>
                        <p class="lead">{{ $unidad->nombre_unidad }}</p>
                    </div>

                    <div class="mt-3">
                        <h5 class="border-bottom pb-2">Objetivo de Aprendizaje</h5>
                        <p class="text-justify">{{ $unidad->objetivo_aprendizaje }}</p>
                    </div>

                    <!-- Botón de eliminar -->
                    <div class="mt-4 border-top pt-3">
                        <form action="{{ route('unidades_tematicas.destroy', [$unidad->no_de_unidad, $unidad->materia]) }}"
                              method="POST"
                              onsubmit="return confirm('¿Está seguro de eliminar esta unidad temática?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Eliminar Unidad Temática
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
