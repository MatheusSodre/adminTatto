<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Create a new instance.
     *
     * @param  Model  $model
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve all data of repository.
     *
     * @param  array  $columns
     * @return mixed
     */
    public function all(): mixed
    {
        return $this->model::all();
    }

    /**
     * Retrieve all data of repository, paginated.
     *
     * @param  null  $limit
     * @param  array  $columns
     * @return mixed
     */
    public function paginate(array $relations = [], array $condition = [], array $columns = ['*'], int $limit = 10): mixed
    {
        return $this->model::with($relations)->where($condition)->select($columns)->latest()->paginate($limit);
    }

    /**
     * Save a new entity in repository.
     *
     * @param  array  $data
     * @return mixed
     */
    public function create(array $data): mixed
    {
        return $this->model->create($data);
    }

    /**
     * Return an entity.
     *
     * @param  int  $id
     * @return mixed
     */
    public function findOrFail(int $id): mixed
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Return an entity.
     *
     * @param  int  $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Update an entity.
     *
     * @param  Model  $entity
     * @param  array  $data
     *
     */

    public function update(array $data, $id)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    /**
     * Delete an entity.
     *
     * @param  Model  $entity
     * @return bool|null
     */
    public function delete($id): bool|null
    {
        return $this->model->find($id)->delete();
    }
    /**
     * Update or create an entity.
     *
     * @param  array  $attributes
     * @param  array  $values
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values): mixed
    {
        return $this->model->updateOrCreate($attributes, $values);
    }

    /**
     * Get entity.
     *
     * @param  array  $condition
     * @param  bool  $takeOne
     * @return mixed
     */
    public function get(array $condition = [],array $relations = [],bool $takeOne = true): mixed
    {
        $result = $this->model::with($relations)->where($condition);
        if ($takeOne) {
            return $result->first();
        }

        return $result->get();
    }

    public function getByUUID(string $field,string $uuid = null)
    {
        return $this->model->where($field, $uuid)->firstOrFail();
    }
    public function updateByUUID(string $field,string $uuid = null,array $data)
    {
        return $this->getByUUID($field,$uuid)->update($data);
    }
    public function destroyByUUID(string $field,string $uuid)
    {
        return $this->getByUUID($field,$uuid)->delete();
    }
}
