<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coach extends Model {

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'coach_number',
        'route_id',
        'car_id',
        'driver_id',
        'supervisor_id',
        'coach_type',
        'fare',
    ];

    public function route() {
        return $this->belongsTo('App\Route')->first();
    }

    public function car() {
        return $this->belongsTo('App\Car')->first();
    }

    public function driver() {
        $driver = $this->belongsTo('App\Employee')->first();
        if ($driver) {
            return $driver->name;
        } else {
            return '';
        }
    }

    public function supervisor() {
        $supervisor = $this->belongsTo('App\Employee')->first();
        if ($supervisor) {
            return $supervisor->name;
        } else {
            return '';
        }
    }

    public function getCounterById($id) {
        return Counter::find($id)->counter_name;
    }

}
