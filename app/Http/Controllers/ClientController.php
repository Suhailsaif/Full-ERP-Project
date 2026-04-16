

<?php

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct(
        private ClientServiceInterface $service
    ) {}

    public function index()
    {
        return ClientResource::collection(
            $this->service->list()
        );
    }

    public function store(StoreClientRequest $request)
    {
        $dto = ClientDTO::fromArray($request->validated());

        return new ClientResource(
            $this->service->create($dto)
        );
    }
}