<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Auditable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;
use App\Constant\app;

class HistoryAdminTeacher extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory, Auditable;

    protected $appends = [
        'photo',
    ];

    public $table = 'history_admin_teachers';

    protected $dates = [
        'date_of_birth',
        'pabbajja',
        'allow_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'fist_name',
        'last_name',
        'gender',
        'eng_name',
        'eng_last',
        'date_of_birth',
        'text',
        'tribes',
        'religion',
        'pabbajja',
        'identification_card',
        'province_birth',
        'district_birth',
        'village_birth',
        'current_province',
        'current_district',
        'current_village',
        'temple',
        'phone_no_1',
        'phone_no_2',
        'office_phone',
        'census',
        'allow_date',
        'live_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
/*
    public static function boot() // sent email notification
    {
        parent::boot();
        HistoryAdminTeacher::observe(new \App\Observers\HistoryAdminTeacherActionObserver);
    } */

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPabbajjaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPabbajjaAttribute($value)
    {
        $this->attributes['pabbajja'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getAllowDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAllowDateAttribute($value)
    {
        $this->attributes['allow_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
