<?php

namespace App\Observers;

use App\Models\ContentCategory;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ContentCategoryActionObserver
{
    public function created(ContentCategory $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'ContentCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(ContentCategory $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'ContentCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(ContentCategory $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'ContentCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
