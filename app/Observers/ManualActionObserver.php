<?php

namespace App\Observers;

use App\Models\Manual;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ManualActionObserver
{
    public function created(Manual $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Manual'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Manual $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Manual'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Manual $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Manual'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
