<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;


class Profile extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'user_id', 'role_id', 'mobile', 'address', 'status'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public static function getProfileByUserID($id = null)
    {
        return DB::table('profiles')->where('user_id', $id)->first();
    }
}
