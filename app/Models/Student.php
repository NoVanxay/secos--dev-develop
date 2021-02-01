<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class Student extends Model implements HasMedia
{
    use  InteractsWithMedia, Auditable, HasFactory;

    public $table = 'students';

    protected $appends = [
        'photo',
    ];

    protected $hidden = [
        'password',
    ];

    protected $dates = [
        'date_of_birth',
        'created_at',
        'updated_at',
        'deleted_at',
    ];



    protected $fillable = [
        'st_code',
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'village',
        'district',
        'province',
        'father_name',
        'father_no',
        'mother_name',
        'mother_no',
        'academic_years_id',
        'classroom_id',
        'school_id',
        'end_from',
        'phone_no',
        'note',
        'email',
        'password',
        'roles_id',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

  /*   public static function boot() // sent email notification
    {
        parent::boot();
        Student::observe(new \App\Observers\StudentActionObserver);
    } */

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class, 'classroom_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function academic_years()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_years_id');
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
    public function roles()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }
}
