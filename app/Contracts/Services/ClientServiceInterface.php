<?php

namespace App\Contracts\Services;
interface ClientServiceInterface
{
    public function list(int $perPage = 15);
    public function find(int $id);
    public function create(ClientDTO $dto);
    public function update(int $id, ClientDTO $dto);
    public function delete(int $id): bool;
}
