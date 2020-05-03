<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flags extends Model
{
    Protected $fillable = ['challenge_name', 'flag', 'course'];
    Protected $primaryKey = 'id';

    public function users()
    {
        $this->hasOneThrough(User::class, UserFlags::class, 'id');
    }

}
