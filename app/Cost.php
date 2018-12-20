<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cost extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'cost_category_id',
        'description',
        'amount',
        'car_id',
        'route_id',
        'date',
    ];
    public function cost_category_name(){
        return \App\CostCategory::find($this->cost_category_id)->cost_category_name;
    }
}
