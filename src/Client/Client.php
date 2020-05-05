<?php

namespace App\Client;

use App\Model;

class Client extends Model
{
	protected $table = 'clients';

	public $id;
	public $name;
	public $birthday;
    public $cpf;
    public $rg;
    public $tel;

    public static function findByCpf(string $cpf)
    {
        return self::findByField(['cpf' => $cpf]);
    }
}
