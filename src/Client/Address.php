<?php

namespace App\Client;

use App\Model;

class Address extends Model
{
    protected $table = 'addresses';

    public string $id;
    public string $client_id;
    public string $street;
    public string $number;
    public string $complement;
    public string $neighborhood;
    public string $zip_code;
    public string $city;
    public string $state;

    public static function make(array $data): self
    {
        $address = new Address();

        $address->street = $data['street'];
        $address->number = $data['number'];
        $address->complement = $data['complement'];
        $address->neighborhood = $data['neighborhood'];
        $address->zip_code = $data['zip_code'];
        $address->city = $data['city'];
        $address->state = $data['state'];

        return $address;
    }

    public static function allByClient(string $clientId)
    {
        return self::allByField(['client_id' => $clientId]);
    }
}
