<?php

declare(strict_types=1);

namespace App\Action;


use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CreateUserAction
{
    public function execute(CreateUserRequest $request): CreateUserResponse
    {
        $user = new User();
        $user->name = $request->getName();
        $user->email = $request->getEmail();
        $user->age = $request->getAge();
        $user->password = Hash::make($request->getPassword());

        if ($request->getAvatar()) {
            $newPath = $request->getAvatar()->store('photos', 'public');
            $user->avatar = Storage::url($newPath);
        }

        $user->save();

        return new CreateUserResponse("Пользователь был успешно добавлен!");
    }
}
