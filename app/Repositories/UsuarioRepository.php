<?php

namespace App\Repositories;

use App\Models\Usuario;
use App\Repositories\BaseRepository;

/**
 * Class UsuarioRepository
 * @package App\Repositories
 * @version August 24, 2023, 1:58 pm UTC
*/

class UsuarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'usuario',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'telefono',
        'email'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Usuario::class;
    }
}
