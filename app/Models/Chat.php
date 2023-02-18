<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chats';

    protected $fillable = [
        'user_id',
        'employee_id',
        'message', //messsage content
        'user_read',    //user read the message or not
        'employee_read',    //employee read the message or not
        'sender',  //user or employee
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
