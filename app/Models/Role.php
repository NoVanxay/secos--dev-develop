<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Role extends Model
{
    use Auditable, HasFactory;

    public $table = 'roles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
 /*    public static function boot() // sent email notification
    {
        parent::boot();
        Role::observe(new \App\Observers\RoleActionObserver);
    }
 */
    public function rolesStudents()
    {
        return $this->hasMany(Student::class, 'roles_id', 'id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
