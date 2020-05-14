<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    protected $table = 'upskill_team_users';
    protected $fillable = [
        'id', 'team_id', 'user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
