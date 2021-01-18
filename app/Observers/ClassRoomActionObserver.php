<?php

namespace App\Observers;

use App\Models\ClassRoom;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ClassRoomActionObserver
{
    public function created(ClassRoom $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'ClassRoom'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(ClassRoom $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'ClassRoom'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(ClassRoom $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'ClassRoom'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
