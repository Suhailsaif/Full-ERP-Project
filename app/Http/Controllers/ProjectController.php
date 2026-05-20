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


    // public function store(Request $request)
    // {
    //     $project = $this->service->create($request->all());

    //     return new ProjectResource($project);
    // }

    public function store(StoreProjectRequest $request)
{
    $project = $this->service->create(
        $request->validated()
    );

    return new ProjectResource($project);
}

    // public function update(Request $request, Project $project)
    // {
    //     $project = $this->service->update($project,$request->all());

    //     return new ProjectResource($project);
    // }

    public function update(
    UpdateProjectRequest $request,
    Project $project
) {
    $project = $this->service->update(
        $project,
        $request->validated()
    );

    return new ProjectResource($project);
}

    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    public function index()
{
    $projects = $this->service->list();

    return ProjectResource::collection($projects);
}
}