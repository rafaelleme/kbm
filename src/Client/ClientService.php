<?php

namespace App\Client;

use App\Service;
use App\Model;

class ClientService extends Service
{
	public $modelClass = Client::class;

    public function create(array $data): Model
    {
        $client = Client::findByCpf($data['cpf']);

        if (!empty($client)) {
            throw new \Exception('Client already exists.', 200);
        }

        $client = parent::create($data);

        foreach ($data['addresses'] as $address) {
            $address = Address::make($address);
            $address->client_id = $client->id;
            $address->save();
        }

        return $client;
    }

	protected function fill(&$model, array $data): void
	{
        if (!empty($data['name'])) {
            $model->name = $data['name'];
        }

        if (!empty($data['birthday'])) {
            $model->birthday = $data['birthday'];
        }

        if (!empty($data['cpf'])) {
            $model->cpf = $data['cpf'];
        }

        if (!empty($data['rg'])) {
            $model->rg = $data['rg'];
        }

        if (!empty($data['tel'])) {
            $model->tel = $data['tel'];
        }
    }

	public function destroy(string $clientId)
    {
        $addresses = Address::allByClient($clientId);

        foreach ($addresses as $address) {
            $address->delete();
        }

        $client = Client::find($clientId);
        $client->delete();
        return null;
    }
}
