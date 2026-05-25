<?php

namespace App\Services\Project;

use App\Models\Project;
use App\Services\BaseService;
use App\Services\Approval\ApprovalService;
use App\Repositories\Contracts\ProjectRepositoryInterface;


class ProjectService extends BaseService
{

protected ProjectRepositoryInterface $repository;

public function __construct(
    ProjectRepositoryInterface $repository
) {
    $this->repository = $repository;
}


public function list()
{
    return $this->repository->paginate();
}

public function create(array $data)
{
    return $this->repository->create($data);
}

public function update(Project $project, array $data)
{
    return $this->repository->update(
        $project->id,
        $data
    );
}
    

    public function delete(Project $project)
    {
        return $this->transaction(function () use ($project) {

            $project->delete();

            return true;
        });
    }


}