<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['user_id', 'message'];
    protected $hidden = ['user_id', 'seen', 'updated_at'];
    protected $with = ['user'];

    protected $casts = [
        'seen' => 'boolean',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->timezone(env('APP_TIMEZONE', 'UTC'))->format('Y-m-d H:i:s');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
