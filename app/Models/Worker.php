<?php

namespace App\Models;

use App\Events\Worker\CreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'workers';

    protected $guarded = false;

    protected static function booted()
    {
        static::created(function ($worker) {

            event(new CreatedEvent($worker));

        });
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'worker_id', 'id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function avatar(){
        return $this->morphOne(Avatar::class, 'avatarable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

}
