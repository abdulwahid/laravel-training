<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recent_user extends Model
{
    //
    protected $table = 'recent_users';

    public function get_all_users()
    {
        $users = Recent_user::all();
    }
}
