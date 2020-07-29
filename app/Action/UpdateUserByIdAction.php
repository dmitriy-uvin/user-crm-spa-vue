<?php

declare(strict_types=1);

namespace App\Action;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UpdateUserByIdAction
{
    public function execute(UpdateUserByIdRequest $request): UpdateUserByIdResponse
    {
        $user = User::find($request->getId());

        $user->name = $request->getName();
        $user->email = $request->getEmail();
        $user->age = $request->getAge();

        if ($request->getAvatar()) {
            $newPath = $request->getAvatar()->store('photos', 'public');
            $user->avatar = Storage::url($newPath);
        }

        if ($request->getPassword()) {
            $user->password = Hash::make($request->getPassword());
        }

        $user->save();

        return new UpdateUserByIdResponse("Пользователь был успешно обновлен");
    }
}
