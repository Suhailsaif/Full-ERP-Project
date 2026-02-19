<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use App\Services\TenantResolver;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (auth()->check() && $model->getTable() !== 'companies') {
            $companyId = app(TenantResolver::class)->getCompanyId();

            if ($companyId) {
                $builder->where(
                    $model->getTable() . '.company_id',
                    $companyId
                );
            }
        }
    }
}
