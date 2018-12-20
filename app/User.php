<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {

    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'counter_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function get_counter_name() {
//        $counter = \App\Counter::find($this->counter_id);
//        if ($counter) {
//            return $counter->counter_name;
//        } else {
//            return 'Global';
//        }
//    }

    public function in_counter() {
        if ($this->counter_id != 0) {
            return true;
        }
        return false;
    }

    public function is_admin() {
        if ($this->counter_id == 0) {
            return true;
        }
        return false;
    }
    public function get_counter_name() {
        if ($this->counter_id != 0) {
            return \App\Counter::find($this->counter_id)->counter_name;
        }else{
            return 'Global Admin';
        }
    }

}
