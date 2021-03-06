<?php

namespace App\Client;

use Config\Controller\Controller;

class ClientController extends Controller
{
	public function index()
	{
		return Client::all();
	}

    public function show($clientId)
    {
        return Client::find($clientId);
    }

    public function store(array $data): Client
    {
        return $this->service->create($data);
    }

    public function update(array $data, string $clientId)
    {
        $client = Client::find($clientId);
        return $this->service->update($client, $data);
    }

    public function destroy(string $clientId)
    {
        return $this->service->destroy($clientId);
    }
}
