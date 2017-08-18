<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'last_update_user_id', 'name',
    ];

    /**
     * Get the user that owns the workspace.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the forms for the workspace
     */
    public function forms()
    {
        return $this->hasMany('App\Form');
    }
}
