<?php

namespace App\Repositories\Bases;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    protected Model $model;

    public function __construct()
    {
        $this->makeModel();
    }

    abstract public function model(): string;

    public function makeModel(): Model
    {
        $model = app()->make($this->model());

        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    public function originModel(): Model
    {
        return new $this->model;
    }

    public function all(array $columns = ['*']): Collection
    {
        return $this->model->all($columns);
    }

    public function find(int $id, array $columns = ['*']): ?Model
    {
        return $this->model->find($id, $columns);
    }

    public function findOrFail($id): mixed
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $inputs): Model
    {
        return $this->model->create($inputs);
    }

    public function insert(array $inputs): bool
    {
        return $this->model->insert($inputs);
    }

    public function update(Model $model, array $inputs): bool
    {
        return $model->update($inputs);
    }

    public function delete(Model $model): ?bool
    {
        return $model->delete();
    }

    public function paginate(int $perPage = null): LengthAwarePaginator
    {
        return $this->model->orderBy('id', 'DESC')->paginate($perPage ?? config('consts.PER_PAGE'));
    }

    public function getAll(bool $isSortable = false, int $perPage = null): LengthAwarePaginator
    {
        return $isSortable ?
            $this->model->withTrashed()->sortable(['id' => 'DESC'])->paginate($perPage ?? config('consts.PER_PAGE')) :
            $this->model->withTrashed()->paginate($perPage ?? config('consts.PER_PAGE'));
    }

    public function search(string $keyword, array $columns, bool $isSortable = false, int $perPage = null): LengthAwarePaginator
    {
        $query = $this->model->withTrashed();
        if ($isSortable) {
            $query->sortable(['id' => 'DESC']);
        }

        foreach ($columns as $index => $column) {
            $condition = [$column, 'like', "%$keyword%"];
            if ($index === 0) {
                $query->where(...$condition);

                continue;
            }

            $query->orWhere(...$condition);
        }

        return $query->paginate($perPage ?? config('consts.PER_PAGE'));
    }

    public function findWithTrashed(int $id, array $columns = ['*']): Model
    {
        return $this->model->withTrashed()->findOrFail($id, $columns);
    }

    public function updateOrCreate($data, $optional = [])
    {
        return $this->model->updateOrCreate($data, $optional);
    }

    public function getManyInArray($key, $array, array $with = []): Collection
    {
        return $this->model->with($with)->whereIn($key, $array)->get();
    }

    public function load(array $load = [])
    {
        return $this->model->load($load)->get();
    }

 
    public function where($column, $value)
    {
        return $this->model->where($column, $value)->withTrashed();
    }

    public function whereIn($columns, $value)
    {
        return $this->model->whereIn($columns, $value)->withTrashed();
    }


    public function findByConditionPaginated(array $equalConditions, array $likeConditions, $perPage = 10)
    {
        $query = $this->model->query();

        foreach ($equalConditions as $column => $value) {
            $query->where($column, $value);
        }

        foreach ($likeConditions as $column => $value) {
            $query->where($column, 'like', '%' . $value . '%');
        }

        return $query->paginate($perPage);
    }
}
