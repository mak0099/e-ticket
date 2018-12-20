<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'route_number',
        'route_name',
        'starting_location',
        'destination_location',
        'via_locations',
    ];
    
    public function startingLocation()
    {
        return Location::find($this->starting_location)->location_name;
    }
    public function destinationLocation()
    {
        return Location::find($this->destination_location)->location_name;
    }
    public function getLocationById($id)
    {
        return Location::find($id)->location_name;
    }
}
