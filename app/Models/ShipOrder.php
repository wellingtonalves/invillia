<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'person_id',
        'ship_to',
        'items',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    /**
     * @return mixed
     */
    public function getShipToAttribute()
    {
        return json_decode($this->attributes['ship_to']);
    }

    /**
     * @return mixed
     */
    public function getItemsAttribute()
    {
        return json_decode($this->attributes['items']);
    }
}
