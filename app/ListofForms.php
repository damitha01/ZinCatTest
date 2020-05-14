<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListofForms extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'list_of_forms';

     /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
