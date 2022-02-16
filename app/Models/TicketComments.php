<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketComments extends Model
{
    use HasFactory;

    protected $table = 'Support_Tickets_Comments';

    protected $fillable = [
        'content',
        'author',
        'ticket_id',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m',
    ];

    public function getAuthorNameAttribute() {
        $user = User::where('id', $this->author)->first();
        if($user) {
            return $user->uname;
        }
        return 'Nedefinit';
    }
}
