<?php

namespace App\Http\Controllers;

use App\Action\CreateUserAction;
use App\Action\CreateUserRequest;
use App\Action\DeleteUserByIdAction;
use App\Action\DeleteUserByIdRequest;
use App\Action\GetUsersCollectionAction;
use App\Action\UpdateUserByIdAction;
use App\Action\UpdateUserByIdRequest;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;


class DataController extends Controller
{
    private GetUsersCollectionAction $getUsersCollectionAction;
    private DeleteUserByIdAction $deleteUserByIdAction;
    private CreateUserAction $createUserAction;
    private UpdateUserByIdAction $updateUserByIdAction;

    public function __construct(
        GetUsersCollectionAction $getUsersCollectionAction,
        DeleteUserByIdAction $deleteUserByIdAction,
        CreateUserAction $createUserAction,
        UpdateUserByIdAction $updateUserByIdAction
    ) {
        $this->getUsersCollectionAction = $getUsersCollectionAction;
        $this->deleteUserByIdAction = $deleteUserByIdAction;
        $this->createUserAction = $createUserAction;
        $this->updateUserByIdAction = $updateUserByIdAction;
    }

    public function createUser(AddUserRequest $request)
    {
        $response = $this->createUserAction->execute(
            new CreateUserRequest(
                $request->name,
                $request->email,
                (int)$request->age,
                $request->password,
                $request->avatar
            )
        );

        return response()->json(["message" => $response->getMessage()]);
    }

    public function updateUserById(UpdateUserRequest $request)
    {
        $response = $this->updateUserByIdAction->execute(
            new UpdateUserByIdRequest(
                (int)$request->id,
                $request->name,
                $request->email,
                (int)$request->age,
                $request->password,
                $request->avatar
            )
        );

        return response()->json(["message" => $response->getMessage()]);
    }

    public function deleteUserById(string $id)
    {
        $this->deleteUserByIdAction->execute(
            new DeleteUserByIdRequest(
                (int)$id
            )
        );

        return response()->json(['message' => 'Пользователь был удален!'], 200);
    }

    public function getUsersCollection()
    {
        $reponse = $this->getUsersCollectionAction->execute();

        return response()->json([
            'users' => $reponse->getUsersCollection()
        ], 200);
    }
}
