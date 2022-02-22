<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Stevebauman\Location\Facades\Location;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uname',
        'email',
        'upassword'
    ];

    public $timestamps = false;

    protected $table = 'Player_Accounts';

    public function setPasswordAttribute($password)
    {
        $this->attributes['upassword'] = $password;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'upassword',
    ];

    public function getIpLocationAttribute() {
        $ip = $this->ip;
        if($ip != 'NONE' && $ip != '127.0.0.1') {
            return Location::get($ip)->countryName;
        } else {
            return 'Raii';
        }
    }

    public function getLastLoginAttribute() {
        $csgo = $this->last_csgo_activity;
        $cs = $this->last_cs_activity;
        if($cs > $csgo) {
            return round((Carbon::now()->timestamp - $cs) / (60 * 60 * 24));
        } else {
            return round((Carbon::now()->timestamp - $csgo) / (60 * 60 * 24));
        }
    }
}
