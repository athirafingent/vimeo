<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'upskill_teams';
    protected $fillable = [
        'id', 'name', 'created_by', 'updated_by', 'status'
    ];

    public function team_created_by()
    {
        return $this->hasOne('App\User','id','created_by');
    }
    public function team_updated_by()
    {
        return $this->hasOne('App\User','id','updated_by');
    }
    public function team_users()
    {
        return $this->hasMany('App\TeamUser','team_id','id');
    }
}
