<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;

    protected $table = 'Reports';

    protected $fillable = [
        'report_type',
        'author',
        'reported_player',
        'informations'
    ];

    protected $casts = [
        'status' => 'boolean',
        'created_at' => 'datetime:Y-m-d H:m',
        'updated_at' => 'datetime:Y-m-d H:m',
    ];

    public function getSolvedByNameAttribute()
    {
        $user = User::where('id', $this->solved_by)->first();
        if($user) {
            return $user->uname;
        }
        return 'Nimeni';
    }

    public function getAuthorNameAttribute() {
        $user = User::where('id', $this->author)->first();
        if($user) {
            return $user->uname;
        }
        return 'Nimeni';
    }
}
