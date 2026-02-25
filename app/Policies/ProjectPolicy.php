<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Project;
use App\Models\User;

class ProjectPolicy
{
   public function view(User $user, Project $project)
{
    return $user->hasPermission('project.view');
}

public function create(User $user)
{
    return $user->hasPermission('project.create');
}

public function update(User $user, Project $project)
{
    return $user->hasPermission('project.update');
}

public function delete(User $user, Project $project)
{
    return $user->hasPermission('project.delete');
}
}
