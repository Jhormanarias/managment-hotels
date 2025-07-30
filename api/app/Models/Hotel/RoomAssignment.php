<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RoomAssignment extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['hotel_id', 'type', 'accommodation', 'quantity'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::ulid();
        });
    }
}
