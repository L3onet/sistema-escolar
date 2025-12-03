<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AseguradoraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'clave_aseguradora' => $this->clave_aseguradora,
            'nombre' => $this->nombre,
            'fecha_inicial' => $this->fecha_inicial->format('Y-m-d H:i:s'),
            'fecha_final' => $this->fecha_final->format('Y-m-d H:i:s'),
            'no_seguro' => $this->no_seguro,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
