<?php

declare(strict_types=1);

namespace App\Action;

use App\User;

class GetUsersCollectionAction
{
    public function execute()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return new GetUsersCollectionResponse($users);
    }
}
