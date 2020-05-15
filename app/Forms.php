<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forms';

     /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
