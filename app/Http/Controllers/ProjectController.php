<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\Project\ProjectService;
use App\Http\Resources\Project\ProjectResource;

class ProjectController extends Controller
{
    public function __construct(
        protected ProjectService $service
    ) {}

    public function store(Request $request)
    {
        $project = $this->service->create($request->all());

        return new ProjectResource($project);
    }

    public function update(Request $request, Project $project)
    {
        $project = $this->service->update($project,$request->all());

        return new ProjectResource($project);
    }

    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    public function index()
    {
        return ProjectResource::collection(
            Project::latest()->paginate(10)
        );
    }
}