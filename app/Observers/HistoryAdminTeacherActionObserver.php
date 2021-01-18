<?php

namespace App\Observers;

use App\Models\HistoryAdminTeacher;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class HistoryAdminTeacherActionObserver
{
    public function created(HistoryAdminTeacher $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'HistoryAdminTeacher'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(HistoryAdminTeacher $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'HistoryAdminTeacher'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(HistoryAdminTeacher $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'HistoryAdminTeacher'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
