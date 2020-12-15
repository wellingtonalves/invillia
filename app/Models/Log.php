<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = ['data', 'status'];

    /**
     * @return mixed
     */
    public function getDataAttribute()
    {
        return json_decode($this->attributes['data']);
    }
}
