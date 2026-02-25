<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\Project\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }
//  public function __construct(
//         private ProjectServiceInterface $service
//     ) {}

    
    public function store(ProjectRequest $request)
    {
        $dto = ProjectDTO::fromArray($request->validated());

        return new ProjectResource(
            $this->service->create($dto)
        );
    }
    public function update(Request $request, Project $project)
    {
        $project = $this->service->update($project, $request->all());

        return response()->json($project);
    }

    public function destroy(Project $project)
    {
        $this->service->delete($project);

        return response()->json(['message' => 'Deleted']);
    }
}