<?php

namespace App\Observers;

use App\Models\Policy;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class PolicyActionObserver
{
    public function created(Policy $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Policy'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Policy $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Policy'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Policy $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Policy'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
