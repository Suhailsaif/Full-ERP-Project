<?php

namespace App\Contracts\Services;

use App\DTOs\ProjectDTO;

interface ProjectServiceInterface
{
    public function create(ProjectDTO $dto);
    public function update(int $id, ProjectDTO $dto);
    public function delete(int $id): bool;
}