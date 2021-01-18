<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class ContentCategory extends Model
{
    use Auditable, HasFactory;

    public $table = 'content_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'content_category',
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
        ContentCategory::observe(new \App\Observers\ContentCategoryActionObserver);
    } */

    public function categoryContents()
    {
        return $this->belongsToMany(Content::class);
    }
}
