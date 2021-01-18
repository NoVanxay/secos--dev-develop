<?php

namespace App\Observers;

use App\Models\Template;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class TemplateActionObserver
{
    public function created(Template $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Template'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Template $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Template'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Template $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Template'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
