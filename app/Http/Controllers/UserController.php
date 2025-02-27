<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class UserController extends Controller
{
    public function personal()
    {
        $user = UserResource::make(auth()->user())->resolve();
        return inertia('User/Personal', compact('user'));
    }


    public function update(UpdateRequest $request)
    {
        $data = $request->validated();

        // Удаление старого аватара, если он существует
        if (auth()->user()->avatar) {
            Storage::disk('public')->delete(auth()->user()->avatar);
        }

        // Сохранение нового аватара
        $path = Storage::disk('public')->put('/avatars', $data['avatar']);

        // Обновление пути в базе
        auth()->user()->update(['avatar' => $path]);

        // Инициализация ImageManager с GdDriver
        $manager = new ImageManager(new GdDriver());

        // Читаем изображение, ресайзим и сохраняем
        $image = $manager->read(storage_path("app/public/{$path}"))->cover(95, 95);
        $image->save();

        return UserResource::make(auth()->user())->resolve();
    }

}
