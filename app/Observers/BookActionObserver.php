<?php

namespace App\Observers;

use App\Models\Book;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class BookActionObserver
{
    public function created(Book $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Book'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Book $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Book'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Book $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Book'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
