<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotManChat extends Model
{
    use HasFactory;

    protected $table="bot_man_chats";
    protected $fillable = [
        'name', 
        'email',
        'question',
        'answer'
    ];
}
