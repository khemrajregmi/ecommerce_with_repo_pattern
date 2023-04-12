<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerGroup extends Model
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
    protected $table = 'kng_customer_groups';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'customer_group_id';


    /**
     * @var array
     */
    protected $fillable = [
        'customer_group_id',
        'name',
        'language_id',
        'description',
        'approval'
    ];

    /**
     * Get the Customer for the customer group.
     */
    public function Customer()
    {
        return $this->hasMany('App\Models\Customer','customer_group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class,'kng_customergroup_store','customer_group_id','store_id')->withTimestamps();
    }
}
