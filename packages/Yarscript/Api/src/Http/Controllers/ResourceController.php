<?php

namespace Yarscript\Api\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Auth;
use Yarscript\Core\{Eloquent\Repository, Http\Controllers\BaseController};

/**
 * Class ResourceController
 * @package Yarscript\Api\Http\Controllers
 */
class ResourceController extends BaseController
{
    /**
     * @var array|string
     */
    protected array $_config;

    /**
     * @var Repository|mixed
     */
    protected Repository $repository;

    /**
     * ResourceController constructor.
     */
    public function __construct()
    {
        $this->_config = request('_config');

        $this->repository = app($this->_config['repository']);
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $query = $this->repository->scopeQuery(function ($query) {
            if ($this->authRequired()) {
                $query = $query->where('user_id', Auth::id());
            }

            foreach (request()->except(['page', 'limit', 'pagination', 'sort', 'order', 'token']) as $input => $value) {
                $query = $query->whereIn($input, array_map('trim', explode(',', $value)));
            }

            if ($sort = request()->input('sort')) {
                $query = $query->orderBy($sort, request()->input('order') ?? 'desc');
            } else {
                $query = $query->orderBy($this->getUriEntity() . '_id', 'desc');
            }

            return $query;
        });

        if (is_null(request()->input('pagination')) || request()->input('pagination')) {
            $results = $query->paginate(request()->input('limit') ?? 10);
        } else {
            $results = $query->get();
        }

        return $this->jsonResponse('Success', (array)($this->_config['resource']::collection($results)));
    }

    /**
     * @param string $uuid
     * @return mixed
     */
    public function get(string $uuid)
    {
        try {
            $query = $this->authRequired()
                ? $this->repository->where('user_id', Auth::id())->findOrFail($uuid)
                : $this->repository->findOneByField($this->getUriEntity() . '_uuid', $uuid);

            return $this->jsonResponse('Success', (array)(new $this->_config['resource']($query)));
        } catch (Exception $e) {
            return $this->jsonResponse($e->getMessage(), ['code' => $e->getCode()], 500);
        }
    }

    /**
     * @return bool
     */
    protected function authRequired(): bool
    {
        return isset($this->_config['authorization_required']) && $this->_config['authorization_required'];
    }

    /**
     * Get entity from uri
     * @return string
     */
    protected function getUriEntity(): string
    {
        return last(explode('/', request()->route()->getPrefix()));
    }
}
