<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aseguradora;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Controlador API para la gestión de Aseguradoras.
 *
 * Este controlador maneja todas las operaciones CRUD para el recurso Aseguradora
 * a través de endpoints RESTful, retornando respuestas en formato JSON.
 *
 * @package App\Http\Controllers\Api
 */
class AseguradoraApiController extends Controller
{
    /**
     * Obtiene el listado completo de aseguradoras.
     *
     * Retorna todas las aseguradoras registradas en el sistema.
     *
     * @return JsonResponse Colección de aseguradoras en formato JSON
     *
     * @example GET /api/aseguradoras
     * @response 200 [{"clave_aseguradora": "ASE001", "nombre": "Seguro Total", ...}]
     */
    public function index(): JsonResponse
    {
        $aseguradoras = Aseguradora::all();
        return response()->json($aseguradoras);
    }

    /**
     * Almacena una nueva aseguradora en la base de datos.
     *
     * Valida los datos recibidos y crea un nuevo registro de aseguradora.
     *
     * @param Request $request Datos de la petición HTTP
     *
     * @return JsonResponse Aseguradora creada con código 201
     *
     * @throws \Illuminate\Validation\ValidationException Si la validación falla
     *
     * @example POST /api/aseguradoras
     * @body {
     *     "clave_aseguradora": "ASE001",
     *     "nombre": "Seguro Total",
     *     "fecha_inicial": "2025-01-01",
     *     "fecha_final": "2026-01-01",
     *     "no_seguro": "POL-2025-001"
     * }
     * @response 201 {"clave_aseguradora": "ASE001", "nombre": "Seguro Total", ...}
     * @response 422 {"message": "The given data was invalid.", "errors": {...}}
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'clave_aseguradora' => 'required|string|unique:aseguradoras',
            'nombre' => 'required|string|max:255',
            'fecha_inicial' => 'required|date',
            'fecha_final' => 'required|date',
            'no_seguro' => 'required|string|max:255',
        ]);

        $aseguradora = Aseguradora::create($request->all());
        return response()->json($aseguradora, 201);
    }

    /**
     * Muestra los detalles de una aseguradora específica.
     *
     * Busca y retorna una aseguradora por su identificador único.
     *
     * @param string $id Identificador único de la aseguradora (clave_aseguradora)
     *
     * @return JsonResponse Datos de la aseguradora o mensaje de error
     *
     * @example GET /api/aseguradoras/{id}
     * @response 200 {"clave_aseguradora": "ASE001", "nombre": "Seguro Total", ...}
     * @response 404 {"error": "Aseguradora no encontrada"}
     */
    public function show(string $id): JsonResponse
    {
        try {
            $aseguradora = Aseguradora::findOrFail($id);
            return response()->json($aseguradora);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Aseguradora no encontrada'], 404);
        }
    }

    /**
     * Actualiza los datos de una aseguradora existente.
     *
     * Valida los datos recibidos y actualiza el registro de la aseguradora.
     * La validación de unicidad excluye el registro actual.
     *
     * @param Request $request Datos de la petición HTTP con los campos a actualizar
     * @param string $id Identificador único de la aseguradora (clave_aseguradora)
     *
     * @return JsonResponse Aseguradora actualizada
     *
     * @throws \Illuminate\Validation\ValidationException Si la validación falla
     * @throws ModelNotFoundException Si la aseguradora no existe
     *
     * @example PUT/PATCH /api/aseguradoras/{id}
     * @body {
     *     "clave_aseguradora": "ASE001",
     *     "nombre": "Seguro Total Actualizado",
     *     "fecha_inicial": "2025-01-01",
     *     "fecha_final": "2027-01-01",
     *     "no_seguro": "POL-2025-002"
     * }
     * @response 200 {"clave_aseguradora": "ASE001", "nombre": "Seguro Total Actualizado", ...}
     * @response 404 {"message": "No query results for model [App\\Models\\Aseguradora]"}
     * @response 422 {"message": "The given data was invalid.", "errors": {...}}
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $request->validate([
            'clave_aseguradora' => "required|string|unique:aseguradoras,clave_aseguradora,{$id},clave_aseguradora",
            'nombre' => 'required|string|max:255',
            'fecha_inicial' => 'required|date',
            'fecha_final' => 'required|date',
            'no_seguro' => 'required|string|max:255',
        ]);

        $aseguradora = Aseguradora::findOrFail($id);
        $aseguradora->update($request->all());
        return response()->json($aseguradora);
    }

    /**
     * Elimina una aseguradora del sistema.
     *
     * Busca la aseguradora por su identificador y la elimina permanentemente.
     *
     * @param string $id Identificador único de la aseguradora (clave_aseguradora)
     *
     * @return JsonResponse Respuesta vacía con código 204 (No Content)
     *
     * @throws ModelNotFoundException Si la aseguradora no existe
     *
     * @example DELETE /api/aseguradoras/{id}
     * @response 204 (Sin contenido)
     * @response 404 {"message": "No query results for model [App\\Models\\Aseguradora]"}
     */
    public function destroy(string $id): JsonResponse
    {
        Aseguradora::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
