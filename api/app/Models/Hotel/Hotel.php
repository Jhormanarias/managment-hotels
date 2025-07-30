<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Hotel extends Model
{
    use SoftDeletes;
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::ulid();
        });
    }

    protected $fillable = [
        'name',
        'address',
        'city',
        'nit',
        'max_rooms',
    ];

    public function roomAssignments()
    {
        return $this->hasMany(RoomAssignment::class);
    }
}
