<?php

namespace App\Observers;

use App\Models\Student;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class StudentActionObserver
{
    public function created(Student $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Student'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Student $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Student'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Student $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Student'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
