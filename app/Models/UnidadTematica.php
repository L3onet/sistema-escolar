<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnidadTematica extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'unidad_tematicas';

    /**
     * Indicates if the model's ID is auto-incrementing.
     * FALSE porque usamos llave primaria compuesta
     */
    public $incrementing = false;

    /**
     * La llave primaria es compuesta
     */
    protected $primaryKey = ['no_de_unidad', 'materia'];

    /**
     * The data type of the primary key ID.
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'no_de_unidad',
        'materia',
        'nombre_unidad',
        'objetivo_aprendizaje',
    ];

    /**
     * Set the keys for a save update query.
     * Sobrescribir para soportar llave compuesta
     */
    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if (!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach ($keys as $keyName) {
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the value for a given key.
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if (is_null($keyName)) {
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }

    /**
     * Método helper para buscar por llave compuesta
     */
    public static function findByCompositeKey($no_de_unidad, $materia)
    {
        return self::where('no_de_unidad', $no_de_unidad)
                   ->where('materia', $materia)
                   ->first();
    }

}
