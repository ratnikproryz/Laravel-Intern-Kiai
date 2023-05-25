<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function getTop5User()
    {
        return User::take(5)->orderBy('created_at', 'DESC')->get();
    }
}
