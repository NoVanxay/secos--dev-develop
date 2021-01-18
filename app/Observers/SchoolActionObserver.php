<?php

namespace App\Observers;

use App\Models\School;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class SchoolActionObserver
{
    public function created(School $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'School'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(School $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'School'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(School $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'School'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
