<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function attendances(){
        return $this->hasMany(Attendances::class);
    }
}