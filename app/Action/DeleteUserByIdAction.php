<?php

declare(strict_types=1);

namespace App\Action;

use App\User;

class DeleteUserByIdAction
{
    public function execute(DeleteUserByIdRequest $request)
    {
        $user = User::find($request->getUserId());
        $user->delete();
    }
}
