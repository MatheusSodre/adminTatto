<?php
namespace App\Repositories\Interfaces;

 interface BaseRepositoryInterface
 {
    public function all();
    public function paginate(array $relations = [], array $condition = [], array $columns = ['*'], int $limit = 10);
    public function create(array $data);
    public function findOrFail(int $id);
    public function update(array $data, $id);
    public function delete($id);
    public function updateOrCreate(array $attributes, array $values);
    public function get(array $condition = [],array $relations = [], bool $takeOne = true);
 }


?>
