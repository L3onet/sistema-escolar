<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aseguradora extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'aseguradoras';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'clave_aseguradora';

    /**
     * Indicates if the model's ID is auto-incrementing.
     */
    public $incrementing = false;

    /**
     * The data type of the primary key ID.
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'clave_aseguradora',
        'nombre',
        'fecha_inicial',
        'fecha_final',
        'no_seguro',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'fecha_inicial' => 'datetime',
        'fecha_final' => 'datetime',
    ];

}
