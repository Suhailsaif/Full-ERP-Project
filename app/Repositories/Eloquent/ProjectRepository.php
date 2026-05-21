<?php

namespace App\Repositories\Eloquent;

use App\Models\Project;
use App\Repositories\Contracts\ProjectRepositoryInterface;

class ProjectRepository extends BaseRepository
    implements ProjectRepositoryInterface
{
    public function __construct(Project $model)
    {
        $this->model = $model;
    }

    /**
     * Active projects
     */
    public function activeProjects()
    {
        return $this->model
            ->where('status', 'active')
            ->latest()
            ->get();
    }

    /**
     * Company projects
     */
    public function companyProjects(int $companyId)
    {
        return $this->model
            ->where('company_id', $companyId)
            ->latest()
            ->get();
    }
}