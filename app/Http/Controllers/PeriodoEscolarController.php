<?php

namespace App\Http\Controllers;

use App\Models\PeriodoEscolar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeriodoEscolarController extends Controller
{
    /**
     * Muestra una lista de todos los períodos escolares con paginación y búsqueda.
     */
    public function index(Request $request)
    {
        $query = PeriodoEscolar::query();

        // Búsqueda
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('periodo', 'LIKE', "%{$search}%")
                  ->orWhere('identificacion_larga', 'LIKE', "%{$search}%")
                  ->orWhere('identificacion_corta', 'LIKE', "%{$search}%")
                  ->orWhere('status', 'LIKE', "%{$search}%");
            });
        }

        // Filtro por status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Filtro por rango de fechas
        if ($request->has('fecha_inicio') && $request->fecha_inicio != '') {
            $query->where('fecha_inicio', '>=', $request->fecha_inicio);
        }

        if ($request->has('fecha_termino') && $request->fecha_termino != '') {
            $query->where('fecha_termino', '<=', $request->fecha_termino);
        }

        // Ordenamiento
        $sortBy = $request->get('sort_by', 'fecha_inicio');
        $sortOrder = $request->get('sort_order', 'desc');
        
        // Validar que el campo de ordenamiento existe
        $allowedSortFields = [
            'periodo', 
            'identificacion_larga', 
            'identificacion_corta', 
            'status', 
            'fecha_inicio', 
            'fecha_termino',
            'created_at'
        ];
        
        if (in_array($sortBy, $allowedSortFields)) {
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $query->orderBy('fecha_inicio', 'desc');
        }

        // Paginación
        $perPage = $request->get('per_page', 15);
        
        // Validar que per_page sea un número válido
        if (!is_numeric($perPage) || $perPage < 1) {
            $perPage = 15;
        }
        
        // Limitar el máximo de registros por página
        $perPage = min($perPage, 100);

        // Obtener resultados paginados
        $periodos = $query->paginate($perPage);

        // Retornar vista
        return view('periodos.index', compact('periodos'));
    }

    /**
     * Muestra el formulario para crear un nuevo período escolar.
     */
    public function create()
    {
        return view('periodos.create');
    }

    /**
     * Almacena un nuevo período escolar en la base de datos.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'periodo' => 'required|string|max:5|unique:periodos_escolares,periodo',
            'identificacion_larga' => 'required|string|max:30',
            'identificacion_corta' => 'required|string|max:12',
            'status' => 'required|string|max:1|in:A,I',
            'fecha_inicio' => 'required|date',
            'fecha_termino' => 'required|date|after:fecha_inicio',
            'inicio_vacacional_ss' => 'required|date',
            'termino_vacacional_ss' => 'required|date|after:inicio_vacacional_ss',
            'num_dias_clase' => 'required|integer|min:1',
            'inicio_especial' => 'nullable|date',
            'fin_especial' => 'nullable|date|after:inicio_especial',
            'cierre_horarios' => 'required|string|max:1|in:S,N',
            'cierre_seleccion' => 'required|string|max:1|in:S,N',
            'inicio_enc_estudiantil' => 'nullable|date',
            'fin_enc_estudiantil' => 'nullable|date|after:inicio_enc_estudiantil',
            'inicio_sele_alumnos' => 'nullable|date',
            'fin_sele_alumnos' => 'nullable|date|after:inicio_sele_alumnos',
            'inicio_vacacional' => 'nullable|date',
            'termino_vacacional' => 'nullable|date|after:inicio_vacacional',
            'parcial1_inicio' => 'nullable|date',
            'parcial1_fin' => 'nullable|date|after:parcial1_inicio',
            'parcial2_inicio' => 'nullable|date',
            'parcial2_fin' => 'nullable|date|after:parcial2_inicio',
            'parcial3_inicio' => 'nullable|date',
            'parcial3_fin' => 'nullable|date|after:parcial3_inicio',
            'filtro' => 'nullable|string|max:1',
            'nota_resp' => 'nullable|string|max:500',
            'nota' => 'nullable|string',
            'inicio_cal_docentes' => 'nullable|date',
            'fin_cal_docentes' => 'nullable|date|after:inicio_cal_docentes',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            PeriodoEscolar::create($request->all());

            return redirect()->route('periodos-escolares.index')
                ->with('success', 'Período escolar creado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al crear el período escolar: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Muestra un período escolar específico.
     */
    public function show($periodo)
    {
        $periodoEscolar = PeriodoEscolar::find($periodo);

        if (!$periodoEscolar) {
            return redirect()->route('periodos-escolares.index')
                ->with('error', 'Período escolar no encontrado');
        }

        return view('periodos.show', compact('periodoEscolar'));
    }

    /**
     * Muestra el formulario para editar un período escolar.
     */
    public function edit($periodo)
    {
        $periodoEscolar = PeriodoEscolar::find($periodo);

        if (!$periodoEscolar) {
            return redirect()->route('periodos-escolares.index')
                ->with('error', 'Período escolar no encontrado');
        }

        return view('periodos.edit', compact('periodoEscolar'));
    }

    /**
     * Actualiza un período escolar en la base de datos.
     */
    public function update(Request $request, $periodo)
    {
        $periodoEscolar = PeriodoEscolar::find($periodo);

        if (!$periodoEscolar) {
            return redirect()->route('periodos-escolares.index')
                ->with('error', 'Período escolar no encontrado');
        }

        $validator = Validator::make($request->all(), [
            'identificacion_larga' => 'sometimes|required|string|max:30',
            'identificacion_corta' => 'sometimes|required|string|max:12',
            'status' => 'sometimes|required|string|max:1|in:A,I',
            'fecha_inicio' => 'sometimes|required|date',
            'fecha_termino' => 'sometimes|required|date|after:fecha_inicio',
            'inicio_vacacional_ss' => 'sometimes|required|date',
            'termino_vacacional_ss' => 'sometimes|required|date|after:inicio_vacacional_ss',
            'num_dias_clase' => 'sometimes|required|integer|min:1',
            'inicio_especial' => 'nullable|date',
            'fin_especial' => 'nullable|date|after:inicio_especial',
            'cierre_horarios' => 'sometimes|required|string|max:1|in:S,N',
            'cierre_seleccion' => 'sometimes|required|string|max:1|in:S,N',
            'inicio_enc_estudiantil' => 'nullable|date',
            'fin_enc_estudiantil' => 'nullable|date|after:inicio_enc_estudiantil',
            'inicio_sele_alumnos' => 'nullable|date',
            'fin_sele_alumnos' => 'nullable|date|after:inicio_sele_alumnos',
            'inicio_vacacional' => 'nullable|date',
            'termino_vacacional' => 'nullable|date|after:inicio_vacacional',
            'parcial1_inicio' => 'nullable|date',
            'parcial1_fin' => 'nullable|date|after:parcial1_inicio',
            'parcial2_inicio' => 'nullable|date',
            'parcial2_fin' => 'nullable|date|after:parcial2_inicio',
            'parcial3_inicio' => 'nullable|date',
            'parcial3_fin' => 'nullable|date|after:parcial3_inicio',
            'filtro' => 'nullable|string|max:1',
            'nota_resp' => 'nullable|string|max:500',
            'nota' => 'nullable|string',
            'inicio_cal_docentes' => 'nullable|date',
            'fin_cal_docentes' => 'nullable|date|after:inicio_cal_docentes',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $periodoEscolar->update($request->all());

            return redirect()->route('periodos-escolares.index')
                ->with('success', 'Período escolar actualizado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al actualizar el período escolar: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Elimina un período escolar de la base de datos.
     */
    public function destroy($periodo)
    {
        $periodoEscolar = PeriodoEscolar::find($periodo);

        if (!$periodoEscolar) {
            return redirect()->route('periodos-escolares.index')
                ->with('error', 'Período escolar no encontrado');
        }

        try {
            $periodoEscolar->delete();

            return redirect()->route('periodos-escolares.index')
                ->with('success', 'Período escolar eliminado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('periodos-escolares.index')
                ->with('error', 'Error al eliminar el período escolar: ' . $e->getMessage());
        }
    }

    /**
     * Obtiene el período escolar activo.
     */
    public function getPeriodoActivo()
    {
        $periodo = PeriodoEscolar::where('status', 'A')->first();

        if (!$periodo) {
            return redirect()->route('periodos-escolares.index')
                ->with('error', 'No hay período escolar activo');
        }

        return view('periodos.show', compact('periodo'));
    }

    /**
     * Búsqueda avanzada de períodos escolares.
     */
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'query' => 'required|string|min:1',
            'fields' => 'nullable|array',
            'fields.*' => 'in:periodo,identificacion_larga,identificacion_corta,status',
            'per_page' => 'nullable|integer|min:1|max:100'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $query = PeriodoEscolar::query();
        $searchQuery = $request->query;
        $fields = $request->get('fields', ['periodo', 'identificacion_larga', 'identificacion_corta']);

        $query->where(function($q) use ($searchQuery, $fields) {
            foreach ($fields as $field) {
                $q->orWhere($field, 'LIKE', "%{$searchQuery}%");
            }
        });

        $perPage = $request->get('per_page', 15);
        $periodos = $query->orderBy('fecha_inicio', 'desc')->paginate($perPage);

        return view('periodos.index', compact('periodos'));
    }
}