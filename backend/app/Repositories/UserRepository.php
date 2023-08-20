<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Bases\BaseRepository;

class UserRepository extends BaseRepository
{
    public function model(): string
    {
        return User::class;
    }

}
