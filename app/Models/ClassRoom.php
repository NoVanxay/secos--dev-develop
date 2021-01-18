<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class ClassRoom extends Model
{
    use Auditable, HasFactory;

    public $table = 'class_rooms';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'class_room',
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
        ClassRoom::observe(new \App\Observers\ClassRoomActionObserver);
    }
 */
    public function classroomStudents()
    {
        return $this->hasMany(Student::class, 'classroom_id', 'id');
    }

    public function classroomSubjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function schools()
    {
        return $this->belongsToMany(School::class);
    }
}
