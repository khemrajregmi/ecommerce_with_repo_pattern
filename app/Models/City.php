<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
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
    protected $table = 'kng_cities';

    protected $guarded = ['country_id','state_id'];

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'city_id';

    /**
     * @var array
     */
    protected $fillable = [
    	'city_id',
        'state_id',
        'country_id',
        'name',
        'status'
    ];

     /**
     * Get the State for the cities.
     */
    public function State()
    {
        return $this->belongsTo('Kerung\Models\State','state_id');
    }

}

