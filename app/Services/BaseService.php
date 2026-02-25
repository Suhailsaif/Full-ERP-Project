<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

abstract class BaseService
{
    protected function transaction(callable $callback)
    {
        return DB::transaction($callback);
    }

    protected function tenantId(): int
    {
        return auth()->user()->tenant_id;
    }

    protected function paginate(Builder $query, int $perPage = 15): LengthAwarePaginator
    {
        return $query->paginate($perPage);
    }

    protected function applyTenantScope(Builder $query): Builder
    {
        return $query->where('tenant_id', $this->tenantId());
    }
}