<?php

declare(strict_types=1);

namespace App\Action;

use App\User;

class GetUsersCollectionAction
{
    public function execute()
    {
        $users = User::all();
        return new GetUsersCollectionResponse($users);
    }
}
