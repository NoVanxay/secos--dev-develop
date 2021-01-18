<?php

namespace App\Observers;

use App\Models\Subject;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class SubjectActionObserver
{
    public function created(Subject $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Subject'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Subject $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Subject'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Subject $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Subject'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
