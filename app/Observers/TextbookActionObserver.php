<?php

namespace App\Observers;

use App\Models\Textbook;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class TextbookActionObserver
{
    public function created(Textbook $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Textbook'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Textbook $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Textbook'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Textbook $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Textbook'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
