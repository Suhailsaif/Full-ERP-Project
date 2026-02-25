<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class TenantResolver
{
    protected ?Company $company = null;

    public function resolve(): ?Company
    {
        if ($this->company) {
            return $this->company;
        }

        if (Auth::check()) {
            $this->company = Auth::user()->company;
        }

        return $this->company;
    }

    public function getCompanyId(): ?int
    {
        return $this->resolve()?->id;
    }

    
}
