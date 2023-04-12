<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeightClass extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    
    /**
     * @var string
     */
    protected $table = 'kng_weight_classes';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'weight_class_id';

    /**
     * Fillable Data
     *
     * @var array
     */
    protected $fillable = ['title','unit','value'];

}
