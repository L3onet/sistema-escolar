<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnidadTematica;

class UnidadTematicaController extends Controller
{
    /**
     * Display a listing of the resource.
     * READ - Listar todas las unidades temáticas
     */
    public function index(Request $request)
    {
        $query = UnidadTematica::query();

        // Filtro por materia
        if ($request->filled('materia')) {
            $query->where('materia', 'like', "%{$request->materia}%");
        }

        // Filtro por número de unidad
        if ($request->filled('no_unidad')) {
            $query->where('no_de_unidad', $request->no_unidad);
        }

        // Búsqueda general
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nombre_unidad', 'like', "%{$search}%")
                ->orWhere('objetivo_aprendizaje', 'like', "%{$search}%");
            });
        }

        $unidades = $query->orderBy('materia')
                        ->orderBy('no_de_unidad')
                        ->paginate(15)
                        ->withQueryString(); // Mantener parámetros en paginación

        return view('unidades_tematicas.index', compact('unidades'));

    }

    /**
     * Show the form for creating a new resource.
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('unidades_tematicas.create');
    }

    /**
     * Store a newly created resource in storage.
     * CREATE - Guardar nueva unidad temática
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_de_unidad' => 'required|string|max:10',
            'materia' => 'required|string|max:100',
            'nombre_unidad' => 'required|string|max:150',
            'objetivo_aprendizaje' => 'required|string|max:400',
        ], [
            'no_de_unidad.required' => 'El número de unidad es obligatorio',
            'materia.required' => 'La materia es obligatoria',
            'nombre_unidad.required' => 'El nombre de la unidad es obligatorio',
            'objetivo_aprendizaje.required' => 'El objetivo de aprendizaje es obligatorio',
        ]);

        try {
            // Verificar si ya existe la combinación
            $existe = UnidadTematica::findByCompositeKey(
                $request->no_de_unidad,
                $request->materia
            );

            if ($existe) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Ya existe una unidad con ese número para esta materia');
            }

            UnidadTematica::create($validatedData);

            return redirect()
                ->route('unidades_tematicas.index')
                ->with('success', 'Unidad temática creada exitosamente');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al crear la unidad temática: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     * READ - Mostrar detalle de una unidad temática
     */
    public function show($no_de_unidad, $materia)
    {
        $unidad = UnidadTematica::findByCompositeKey($no_de_unidad, $materia);

        if (!$unidad) {
            return redirect()
                ->route('unidades_tematicas.index')
                ->with('error', 'Unidad temática no encontrada');
        }

        return view('unidades_tematicas.show', compact('unidad'));
    }

    /**
     * Show the form for editing the specified resource.
     * Mostrar formulario de edición
     */
    public function edit($no_de_unidad, $materia)
    {
        $unidad = UnidadTematica::findByCompositeKey($no_de_unidad, $materia);

        if (!$unidad) {
            return redirect()
                ->route('unidades_tematicas.index')
                ->with('error', 'Unidad temática no encontrada');
        }

        return view('unidades_tematicas.edit', compact('unidad'));
    }

    /**
     * Update the specified resource in storage.
     * UPDATE - Actualizar unidad temática
     */
    public function update(Request $request, $no_de_unidad, $materia)
    {
        $unidad = UnidadTematica::findByCompositeKey($no_de_unidad, $materia);

        if (!$unidad) {
            return redirect()
                ->route('unidades_tematicas.index')
                ->with('error', 'Unidad temática no encontrada');
        }

        $validatedData = $request->validate([
            'nombre_unidad' => 'required|string|max:150',
            'objetivo_aprendizaje' => 'required|string|max:400',
        ], [
            'nombre_unidad.required' => 'El nombre de la unidad es obligatorio',
            'objetivo_aprendizaje.required' => 'El objetivo de aprendizaje es obligatorio',
        ]);

        try {
            // La llave compuesta NO se puede modificar
            $unidad->update($validatedData);

            return redirect()
                ->route('unidades_tematicas.index')
                ->with('success', 'Unidad temática actualizada exitosamente');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al actualizar la unidad temática: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * DELETE - Eliminar unidad temática
     */
    public function destroy($no_de_unidad, $materia)
    {
        try {
            $unidad = UnidadTematica::findByCompositeKey($no_de_unidad, $materia);

            if (!$unidad) {
                return redirect()
                    ->route('unidades_tematicas.index')
                    ->with('error', 'Unidad temática no encontrada');
            }

            $nombre = $unidad->nombre_unidad;
            $unidad->delete();

            return redirect()
                ->route('unidades_tematicas.index')
                ->with('success', "La unidad temática '$nombre' fue eliminada exitosamente");

        } catch (\Exception $e) {
            return redirect()
                ->route('unidades_tematicas.index')
                ->with('error', 'Error al eliminar la unidad temática: ' . $e->getMessage());
        }
    }
}
