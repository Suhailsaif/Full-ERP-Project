<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\Project\ProjectService;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;

class ProjectController extends Controller
{
    public function __construct(
        protected ProjectService $service
    ) {}


      public function show(Project $project)
{
    return $this->successResponse(
        new ProjectResource($project),
        'Project fetched successfully'
    );
}

public function index()
{
    $projects = $this->service->list();

    return $this->successResponse(
        ProjectResource::collection($projects),
        'Projects fetched successfully'
    );
}
public function store(
    StoreProjectRequest $request
) {
    $project = $this->service->create(
        $request->validated()
    );

    return $this->successResponse(
        new ProjectResource($project),
        'Project created successfully',
        201
    );
}

public function update(
    UpdateProjectRequest $request,
    Project $project
) {
    $project = $this->service->update(
        $project,
        $request->validated()
    );

    return $this->successResponse(
        new ProjectResource($project),
        'Project updated successfully'
    );
}

public function destroy(Project $project)
{
    $project->delete();

    return $this->successResponse(
        null,
        'Project deleted successfully'
    );
}


}