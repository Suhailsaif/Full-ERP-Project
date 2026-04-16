<?php

namespace App\Services;

class ClientService extends BaseService implements ClientServiceInterface
{
    public function list(int $perPage = 15)
    {
        $query = Client::query();
        $query = $this->applyTenantScope($query);

        return $this->paginate($query, $perPage);
    }

    public function find(int $id)
    {
        return Client::where('tenant_id', $this->tenantId())
            ->findOrFail($id);
    }

    public function create(ClientDTO $dto)
    {
        return $this->transaction(function () use ($dto) {
            return Client::create([
                ...$dto->toArray(),
                'tenant_id' => $this->tenantId(),
            ]);
        });
    }

    public function update(int $id, ClientDTO $dto)
    {
        return $this->transaction(function () use ($id, $dto) {
            $client = $this->find($id);
            $client->update($dto->toArray());

            return $client;
        });
    }

    public function delete(int $id): bool
    {
        return $this->transaction(function () use ($id) {
            $client = $this->find($id);
            return $client->delete();
        });
    }
}