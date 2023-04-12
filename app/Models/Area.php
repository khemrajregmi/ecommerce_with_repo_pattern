<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
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
    protected $table = 'kng_areas';

    protected $guarded = ['state_id','city_id'];

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'area_id';

    /**
     * @var array
     */
    protected $fillable = [
    	'area_id',
    	'city_id',
        'state_id',
        'name',
        'zip_code',
        'status'
    ];

     /**
     * Get the State for the cities.
     */
    public function City()
    {
        return $this->belongsTo('Kerung\Models\City','city_id');
    }

     /**
     * Get the State for the cities.
     */
    public function State()
    {
        return $this->belongsTo('Kerung\Models\State','state_id');
    }
}
