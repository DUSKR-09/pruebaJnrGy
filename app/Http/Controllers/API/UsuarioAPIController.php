<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUsuarioAPIRequest;
use App\Http\Requests\API\UpdateUsuarioAPIRequest;
use App\Models\Usuario;
use App\Repositories\UsuarioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UsuarioController
 * @package App\Http\Controllers\API
 */

class UsuarioAPIController extends AppBaseController
{
    /** @var  UsuarioRepository */
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepo)
    {
        $this->usuarioRepository = $usuarioRepo;
    }

    /**
     * Display a listing of the Usuario.
     * GET|HEAD /usuarios
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        $usuarios = $this->usuarioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($usuarios->toArray(), 'Usuarios retrieved successfully');
    }

    /**
     * Store a newly created Usuario in storage.
     * POST /usuarios
     *
     * @param CreateUsuarioAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreateUsuarioAPIRequest $request)
    {
        $input = $request->all();

        $usuario = $this->usuarioRepository->create($input);

        return $this->sendResponse($usuario->toArray(), 'Usuario saved successfully');
    }

    /**
     * Display the specified Usuario.
     * GET|HEAD /usuarios/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var Usuario $usuario */
        $usuario = $this->usuarioRepository->find($id);

        if (empty($usuario)) {
            return $this->sendError('Usuario not found');
        }

        return $this->sendResponse($usuario->toArray(), 'Usuario retrieved successfully');
    }

    /**
     * Update the specified Usuario in storage.
     * PUT/PATCH /usuarios/{id}
     *
     * @param int $id
     * @param UpdateUsuarioAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdateUsuarioAPIRequest $request)
    {
        $input = $request->all();

        /** @var Usuario $usuario */
        $usuario = $this->usuarioRepository->find($id);

        if (empty($usuario)) {
            return $this->sendError('Usuario not found');
        }

        $usuario = $this->usuarioRepository->update($input, $id);

        return $this->sendResponse($usuario->toArray(), 'Usuario updated successfully');
    }

    /**
     * Remove the specified Usuario from storage.
     * DELETE /usuarios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var Usuario $usuario */
        $usuario = $this->usuarioRepository->find($id);

        if (empty($usuario)) {
            return $this->sendError('Usuario not found');
        }

        $usuario->delete();

        return $this->sendSuccess('Usuario deleted successfully');
    }
}
