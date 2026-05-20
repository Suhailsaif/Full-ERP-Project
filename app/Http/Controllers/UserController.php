<?php

namespace App\Http\Controllers;
use App\Http\Resources\User\UserResource;
use App\Services\Project\ProjectService;

use User;

class ProjectController extends Controller
{
    public function __construct(
        protected ProjectService $service
    ) {}


public function index()
{
    return UserResource::collection(
        User::latest()->paginate(20)
    );
}
}