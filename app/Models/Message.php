<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['user_id', 'message'];
    protected $hidden = ['user_id', 'seen', 'updated_at'];

    protected $casts = [
        'seen' => 'boolean',
        'created_at' => 'datetime:Y-m-d H:m:s',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
