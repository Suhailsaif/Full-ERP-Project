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
    // public function create(array $data)
    // {
    //     return $this->transaction(function () use ($data) {

    //         $project = Project::create([
    //             'company_id' => auth()->user()->company_id,
    //             'name'       => $data['name'],
    //             'budget'     => $data['budget'] ?? 0,
    //             'status'     => 'draft',
    //             'start_date' => $data['start_date'] ?? null,
    //             'end_date'   => $data['end_date'] ?? null,
    //         ]);

    //         // If requires approval
    //         if (!empty($data['requires_approval'])) {
    //             $this->approvalService->sendForApproval(
    //                 $project,
    //                 'project.create'
    //             );
    //         }

    //         return $project;
    //     });


    // }

//     public function create(ProjectDTO $dto)
// {
//     return $this->transaction(function () use ($dto) {
//         return Project::create([
//             ...$dto->toArray(),
//             'tenant_id' => $this->tenantId(),
//         ]);
//     });
// }

    // public function update(Project $project, array $data)
    // {
    //     return $this->transaction(function () use ($project, $data) {

    //         $project->update($data);

    //         return $project;
    //     });
    // }

    public function delete(Project $project)
    {
        return $this->transaction(function () use ($project) {

            $project->delete();

            return true;
        });
    }


}