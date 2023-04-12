<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
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
    protected $table = 'kng_states';

    protected $guarded = ['country_id'];

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'state_id';

    /**
     * @var array
     */
    protected $fillable = [
        'state_id',
        'country_id',
        'name',
        'status'
    ];

     /**
     * Get the Country for the state.
     */
    public function Country()
    {
        return $this->belongsTo('Kerung\Models\Country','state_id');
    }

     /**
     * Get the Customer for the customer group.
     */
    public function Order()
    {
        return $this->hasMany('App\Models\Order','state_id');
    }

}
