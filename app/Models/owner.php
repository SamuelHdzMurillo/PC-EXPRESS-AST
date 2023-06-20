<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class owner extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'phone number',
        'email'
    ];

    public function devices(){
        return $this->hasMany("App\Models\device");
    }

}
