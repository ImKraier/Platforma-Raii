<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TicketComments;

class Tickets extends Model
{
    use HasFactory;

    protected $table = 'Support_Tickets';

    protected $fillable = [
        'title',
        'content',
        'author'
    ];

    public function getTakenByNameAttribute()
    {
        $user = User::where('id', $this->taken_by)->first();
        if($user) {
            return $user->uname;
        }
        return 'Nimeni';
    }

    public function getTakenByEmailAttribute()
    {
        $user = User::where('id', $this->taken_by)->first();
        if($user) {
            return $user->email;
        }
        return 'Nimic';
    }

    public function getAuthorNameAttribute() {
        $user = User::where('id', $this->author)->first();
        if($user) {
            return $user->uname;
        }
        return 'Nedefinit';
    }

    public function getAuthorEmailAttribute() {
        $user = User::where('id', $this->author)->first();
        if($user) {
            return $user->email;
        }
        return 'Nedefinit';
    }

    public function comments() {
        return $this->hasMany(TicketComments::class, 'ticket_id', 'id');
    }
}
