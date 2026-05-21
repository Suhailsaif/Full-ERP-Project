<?php

namespace App\Repositories\Contracts;

interface ProjectRepositoryInterface
    extends BaseRepositoryInterface
{
    public function activeProjects();

    public function companyProjects(int $companyId);
}