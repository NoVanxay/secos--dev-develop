<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class School extends Model
{
    use  Auditable, HasFactory;

    public $table = 'schools';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'school',
        'village',
        'district',
        'province',
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
        School::observe(new \App\Observers\SchoolActionObserver);
    }
 */
    public function schoolStudents()
    {
        return $this->hasMany(Student::class, 'school_id', 'id');
    }

    public function schoolClassRooms()
    {
        return $this->belongsToMany(ClassRoom::class);
    }
}
