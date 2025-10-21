<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource with pagination and search.
     */
    public function index(Request $request)
    {
        $query = Alumno::query();

        // Búsqueda por número de control
        if ($request->filled('no_de_control')) {
            $query->where('no_de_control', 'like', '%' . $request->no_de_control . '%');
        }

        // Búsqueda por nombre completo (nombre, apellido paterno, apellido materno)
        if ($request->filled('nombre')) {
            $searchTerm = $request->nombre;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('nombre_alumno', 'like', '%' . $searchTerm . '%')
                    ->orWhere('apellido_paterno', 'like', '%' . $searchTerm . '%')
                    ->orWhere('apellido_materno', 'like', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(nombre_alumno, ' ', apellido_paterno, ' ', apellido_materno) like ?", ['%' . $searchTerm . '%'])
                    ->orWhereRaw("CONCAT(apellido_paterno, ' ', apellido_materno, ' ', nombre_alumno) like ?", ['%' . $searchTerm . '%']);
            });
        }

        // Búsqueda por carrera
        if ($request->filled('carrera')) {
            $query->where('carrera', $request->carrera);
        }

        // Búsqueda por semestre
        if ($request->filled('semestre')) {
            $query->where('semestre', $request->semestre);
        }

        // Búsqueda por estatus
        if ($request->filled('estatus_alumno')) {
            $query->where('estatus_alumno', $request->estatus_alumno);
        }

        // Búsqueda por plan de estudios
        if ($request->filled('plan_de_estudios')) {
            $query->where('plan_de_estudios', $request->plan_de_estudios);
        }

        // Búsqueda por especialidad
        if ($request->filled('especialidad')) {
            $query->where('especialidad', $request->especialidad);
        }

        // Búsqueda por CURP
        if ($request->filled('curp_alumno')) {
            $query->where('curp_alumno', 'like', '%' . $request->curp_alumno . '%');
        }

        // Búsqueda por periodo de ingreso
        if ($request->filled('periodo_ingreso_it')) {
            $query->where('periodo_ingreso_it', $request->periodo_ingreso_it);
        }

        // Ordenamiento
        $sortBy = $request->get('sort_by', 'apellido_paterno');
        $sortOrder = $request->get('sort_order', 'asc');
        
        // Validar campos de ordenamiento permitidos
        $allowedSorts = ['no_de_control', 'nombre_alumno', 'apellido_paterno', 'carrera', 'semestre', 'promedio_aritmetico_acumulado', 'created_at'];
        if (in_array($sortBy, $allowedSorts)) {
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $query->orderBy('apellido_paterno', 'asc')
                  ->orderBy('apellido_materno', 'asc')
                  ->orderBy('nombre_alumno', 'asc');
        }

        // Paginación - cantidad de registros por página
        $perPage = $request->get('per_page', 15);
        $perPage = in_array($perPage, [10, 15, 25, 50, 100]) ? $perPage : 15;

        $alumnos = $query->paginate($perPage)->appends($request->except('page'));

        // Obtener valores únicos para los filtros (opcional)
        $carreras = Alumno::select('carrera')->distinct()->whereNotNull('carrera')->orderBy('carrera')->pluck('carrera');
        $semestres = Alumno::select('semestre')->distinct()->whereNotNull('semestre')->orderBy('semestre')->pluck('semestre');
        $estatuses = Alumno::select('estatus_alumno')->distinct()->whereNotNull('estatus_alumno')->orderBy('estatus_alumno')->pluck('estatus_alumno');

        return view('alumnos.index', compact('alumnos', 'carreras', 'semestres', 'estatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_de_control' => 'required|string|max:10|unique:alumnos,no_de_control',
            'carrera' => 'nullable|string|max:3',
            'reticula' => 'nullable|integer',
            'especialidad' => 'nullable|string|max:5',
            'nivel_escolar' => 'nullable|string|max:1',
            'semestre' => 'nullable|integer',
            'clave_interna' => 'nullable|string|max:10',
            'estatus_alumno' => 'nullable|string|max:3',
            'plan_de_estudios' => 'required|string|max:1',
            'apellido_paterno' => 'nullable|string|max:100',
            'apellido_materno' => 'nullable|string|max:100',
            'nombre_alumno' => 'required|string|max:100',
            'curp_alumno' => 'nullable|string|max:18',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|string|max:1',
            'estado_civil' => 'nullable|string|max:1',
            'tipo_ingreso' => 'required|numeric',
            'periodo_ingreso_it' => 'required|string|max:5',
            'ultimo_periodo_inscrito' => 'nullable|string|max:5',
            'promedio_periodo_anterior' => 'nullable|numeric|between:0,999.99',
            'promedio_aritmetico_acumulado' => 'nullable|numeric|between:0,999.99',
            'creditos_aprobados' => 'nullable|integer',
            'creditos_cursados' => 'nullable|integer',
            'promedio_final_alcanzado' => 'nullable|numeric|between:0,999.99',
            'tipo_servicio_medico' => 'nullable|string|max:1',
            'clave_servicio_medico' => 'nullable|string|max:20',
            'escuela_procedencia' => 'nullable|string|max:50',
            'tipo_escuela' => 'nullable|integer',
            'domicilio_escuela' => 'nullable|string|max:60',
            'entidad_procedencia' => 'nullable|string|max:50',
            'ciudad_procedencia' => 'nullable|string|max:50',
            'correo_electronico' => 'nullable|email|max:60',
            'periodos_revalidacion' => 'nullable|integer',
            'indice_reprobacion_acumulado' => 'nullable|numeric',
            'becado_por' => 'nullable|string|max:100',
            'nip' => 'nullable|integer',
            'tipo_alumno' => 'nullable|string|max:2',
            'nacionalidad' => 'nullable|string|max:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Alumno::create($request->all());

            return redirect()->route('alumnos.index')
                ->with('success', 'Alumno registrado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al registrar el alumno: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $no_de_control)
    {
        $alumno = Alumno::findOrFail($no_de_control);

        return view('alumnos.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $no_de_control)
    {
        $alumno = Alumno::findOrFail($no_de_control);

        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $no_de_control)
    {
        $alumno = Alumno::findOrFail($no_de_control);

        $validator = Validator::make($request->all(), [
            'carrera' => 'nullable|string|max:3',
            'reticula' => 'nullable|integer',
            'especialidad' => 'nullable|string|max:5',
            'nivel_escolar' => 'nullable|string|max:1',
            'semestre' => 'nullable|integer',
            'clave_interna' => 'nullable|string|max:10',
            'estatus_alumno' => 'nullable|string|max:3',
            'plan_de_estudios' => 'required|string|max:1',
            'apellido_paterno' => 'nullable|string|max:100',
            'apellido_materno' => 'nullable|string|max:100',
            'nombre_alumno' => 'required|string|max:100',
            'curp_alumno' => 'nullable|string|max:18',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|string|max:1',
            'estado_civil' => 'nullable|string|max:1',
            'tipo_ingreso' => 'required|numeric',
            'periodo_ingreso_it' => 'required|string|max:5',
            'ultimo_periodo_inscrito' => 'nullable|string|max:5',
            'promedio_periodo_anterior' => 'nullable|numeric|between:0,999.99',
            'promedio_aritmetico_acumulado' => 'nullable|numeric|between:0,999.99',
            'creditos_aprobados' => 'nullable|integer',
            'creditos_cursados' => 'nullable|integer',
            'promedio_final_alcanzado' => 'nullable|numeric|between:0,999.99',
            'tipo_servicio_medico' => 'nullable|string|max:1',
            'clave_servicio_medico' => 'nullable|string|max:20',
            'escuela_procedencia' => 'nullable|string|max:50',
            'tipo_escuela' => 'nullable|integer',
            'domicilio_escuela' => 'nullable|string|max:60',
            'entidad_procedencia' => 'nullable|string|max:50',
            'ciudad_procedencia' => 'nullable|string|max:50',
            'correo_electronico' => 'nullable|email|max:60',
            'periodos_revalidacion' => 'nullable|integer',
            'indice_reprobacion_acumulado' => 'nullable|numeric',
            'becado_por' => 'nullable|string|max:100',
            'nip' => 'nullable|integer',
            'tipo_alumno' => 'nullable|string|max:2',
            'nacionalidad' => 'nullable|string|max:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $alumno->update($request->all());

            return redirect()->route('alumnos.index')
                ->with('success', 'Alumno actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al actualizar el alumno: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $no_de_control)
    {
        try {
            $alumno = Alumno::findOrFail($no_de_control);
            $alumno->delete();

            return redirect()->route('alumnos.index')
                ->with('success', 'Alumno eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al eliminar el alumno: ' . $e->getMessage());
        }
    }

    /**
     * Export alumnos based on current filters.
     */
    public function export(Request $request)
    {
        $query = Alumno::query();

        // Aplicar los mismos filtros que en index
        if ($request->filled('no_de_control')) {
            $query->where('no_de_control', 'like', '%' . $request->no_de_control . '%');
        }

        if ($request->filled('nombre')) {
            $searchTerm = $request->nombre;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('nombre_alumno', 'like', '%' . $searchTerm . '%')
                    ->orWhere('apellido_paterno', 'like', '%' . $searchTerm . '%')
                    ->orWhere('apellido_materno', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($request->filled('carrera')) {
            $query->where('carrera', $request->carrera);
        }

        if ($request->filled('semestre')) {
            $query->where('semestre', $request->semestre);
        }

        if ($request->filled('estatus_alumno')) {
            $query->where('estatus_alumno', $request->estatus_alumno);
        }

        $alumnos = $query->get();

        // Aquí puedes implementar la exportación a Excel, CSV, PDF, etc.
        // Por ejemplo, usando Laravel Excel o generando CSV manualmente

        return response()->json(['message' => 'Exportación implementada', 'count' => $alumnos->count()]);
    }

    /**
     * Clear all filters and return to default view.
     */
    public function clearFilters()
    {
        return redirect()->route('alumnos.index');
    }
}