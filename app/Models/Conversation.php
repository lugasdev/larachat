<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'stat',
        'user_id',
        'channel_id',
        'message',
        'is_reply',
        'reply_to_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
