<?php

declare(strict_types=1);

namespace App\Action;

use Illuminate\Database\Eloquent\Collection;

class GetUsersCollectionResponse
{
    private $usersCollection;

    public function __construct(Collection $usersCollection)
    {
        $this->usersCollection = $usersCollection;
    }

    public function getUsersCollection()
    {
        return $this->usersCollection;
    }
}
