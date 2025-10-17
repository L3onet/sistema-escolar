<?php

namespace App\Http\Controllers;

use App\Models\Aseguradora;
use Illuminate\Http\Request;

class AseguradoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Aseguradora::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nombre', 'like', "%{$search}%")
                ->orWhere('clave_aseguradora', 'like', "%{$search}%");
        }

        $aseguradoras = $query->orderBy('nombre')->paginate(10);

        return view('aseguradoras.index', compact('aseguradoras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aseguradoras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'clave_aseguradora' => 'required|string|max:255|unique:aseguradoras,clave_aseguradora',
            'nombre' => 'required|string|max:255',
            'fecha_inicial' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicial',
            'no_seguro' => 'required|string|max:255',
        ], [
            // Mensajes personalizados
            'clave_aseguradora.required' => 'La clave de la aseguradora es obligatoria',
            'clave_aseguradora.unique' => 'Esta clave ya existe',
            'nombre.required' => 'El nombre es obligatorio',
            'fecha_inicial.required' => 'La fecha inicial es obligatoria',
            'fecha_final.required' => 'La fecha final es obligatoria',
            'fecha_final.after_or_equal' => 'La fecha final debe ser posterior o igual a la fecha inicial',
            'no_seguro.required' => 'El número de seguro es obligatorio',
        ]);

        try {
            // Crear la nueva aseguradora
            Aseguradora::create($validatedData);

            // Redireccionar con mensaje de éxito
            return redirect()
                ->route('aseguradoras.index')
                ->with('success', 'Aseguradora creada exitosamente');

        } catch (\Exception $e) {
            // Redireccionar con mensaje de error
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al crear la aseguradora: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($clave_aseguradora)
    {
        $aseguradora = Aseguradora::findOrFail($clave_aseguradora);
        return view('aseguradoras.show', compact('aseguradora'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($clave_aseguradora)
    {
        $aseguradora = Aseguradora::findOrFail($clave_aseguradora);
        return view('aseguradoras.edit', compact('aseguradora'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $clave_aseguradora)
    {
        $aseguradora = Aseguradora::findOrFail($clave_aseguradora);

        // Validar los datos (clave_aseguradora no se puede modificar)
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicial' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicial',
            'no_seguro' => 'required|string|max:255',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'fecha_inicial.required' => 'La fecha inicial es obligatoria',
            'fecha_final.required' => 'La fecha final es obligatoria',
            'fecha_final.after_or_equal' => 'La fecha final debe ser posterior o igual a la fecha inicial',
            'no_seguro.required' => 'El número de seguro es obligatorio',
        ]);

        try {
            // Actualizar la aseguradora
            $aseguradora->update($validatedData);

            return redirect()
                ->route('aseguradoras.index')
                ->with('success', 'Aseguradora actualizada exitosamente');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al actualizar la aseguradora: ' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($clave_aseguradora)
    {
        try {
            $aseguradora = Aseguradora::findOrFail($clave_aseguradora);
            $nombre = $aseguradora->nombre;

            $aseguradora->delete();

            return redirect()
                ->route('aseguradoras.index')
                ->with('success', "La aseguradora '$nombre' fue eliminada exitosamente");

        } catch (\Exception $e) {
            return redirect()
                ->route('aseguradoras.index')
                ->with('error', 'Error al eliminar la aseguradora: ' . $e->getMessage());
        }
    }
}
