<?php

namespace App\Observers;

use App\Models\Annoucement;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class AnnoucementActionObserver
{
    public function created(Annoucement $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Annoucement'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Annoucement $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Annoucement'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Annoucement $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Annoucement'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
