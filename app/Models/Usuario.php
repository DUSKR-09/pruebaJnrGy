<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Usuario
 * @package App\Models
 * @version August 23, 2023, 6:02 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $equipoClientes
 * @property \Illuminate\Database\Eloquent\Collection $equipoServicios
 * @property string $usuario
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $telefono
 * @property string $email
 */
class Usuario extends Model
{

    public $table = 'usuarios';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'usuario',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'telefono',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'usuario' => 'string',
        'primer_nombre' => 'string',
        'segundo_nombre' => 'string',
        'primer_apellido' => 'string',
        'segundo_apellido' => 'string',
        'telefono' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'usuario' => 'required',
        'primer_nombre' => 'required',
        'primer_apellido' => 'required',
        'segundo_apellido' => 'required',
        'telefono' => 'required',
        'email' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function equipoClientes()
    {
        return $this->hasMany(\App\Models\EquipoCliente::class, 'usuario_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function equipoServicios()
    {
        return $this->hasMany(\App\Models\EquipoServicio::class, 'tecnico_id');
    }
}
