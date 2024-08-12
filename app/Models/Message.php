<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'sender_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
