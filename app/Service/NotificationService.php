<?php

namespace App\Service;

use App\Models\Notification;

class NotificationService
{
    public static function store($message)
    {
        Notification::created([
            'title' => 'Вам поставили лайк',
            'user_id' => $message->user_id,
            'url' => route('themes.show', $message->theme_id) . '#' . $message->id
        ]);
    }
}
