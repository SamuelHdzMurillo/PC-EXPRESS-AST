<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Device;


class Update extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'images',
        'device_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    

    /**
     * Get the device that the update belongs to.
     */
    public function device()
    {
        return $this->belongsTo(device::class);
    }
}
