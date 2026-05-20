<?php

namespace App\Http\Controllers\API\Project;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Project\ProjectService;
use App\Http\Resources\Project\ProjectResource;

class ProjectController extends Controller
{
    public function __construct(
        protected ProjectService $service
    ) {}

    /**
     * List Projects
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10);

        return ProjectResource::collection($projects);
    }

    /**
     * Create Project
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $project = $this->service->create($request->all());

        return new ProjectResource($project);
    }

    /**
     * Show Project
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Update Project
     */
    public function update(Request $request, Project $project)
    {
        $project = $this->service->update(
            $project,
            $request->all()
        );

        return new ProjectResource($project);
    }

    /**
     * Delete Project
     */
    public function destroy(Project $project)
    {
        $this->service->delete($project);

        return response()->json([
            'success' => true,
            'message' => 'Project deleted successfully'
        ]);
    }
}