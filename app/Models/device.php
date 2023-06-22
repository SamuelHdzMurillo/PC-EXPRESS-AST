<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class device extends Model
{
    use HasFactory;

    protected $fillable = [
        'state',
        'device_type',
        'brand',
        'damage',
        'accesories',
        'img',
        'technican',
        'owner_id'
    ];

    public function owner(){
            
            return $this->belongsTo(Owner::class);
    }
}
