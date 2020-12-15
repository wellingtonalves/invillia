<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\Util\Json;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'phones',
    ];

    /**
     * @return mixed
     */
    public function getPhonesAttribute()
    {
        return json_decode($this->attributes['phones']);
    }
}
