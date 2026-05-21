<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    /**
     * Get all
     */
    public function all()
    {
        return $this->model->latest()->get();
    }

    /**
     * Paginate
     */
    public function paginate(int $perPage = 20)
    {
        return $this->model
            ->latest()
            ->paginate($perPage);
    }

    /**
     * Find
     */
    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Create
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update
     */
    public function update(int $id, array $data)
    {
        $record = $this->find($id);

        $record->update($data);

        return $record;
    }

    /**
     * Delete
     */
    public function delete(int $id)
    {
        $record = $this->find($id);

        return $record->delete();
    }
}