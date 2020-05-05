<?php

namespace App\User;

use App\Service;
use App\Model;

class UserService extends Service
{
	public $modelClass = User::class;

	public function create(array $data): Model
    {
        $user = User::findByEmail($data['email']);

        if (!empty($user)) {
            throw new \Exception('User already exists.', 200);
        }

        parent::create($data);
    }

	protected function fill(&$model, array $data): void
	{
		$model->name = $data['name'];
		$model->email = $data['email'];
		$model->password = password_hash($data['password'], PASSWORD_BCRYPT);
	}
}
