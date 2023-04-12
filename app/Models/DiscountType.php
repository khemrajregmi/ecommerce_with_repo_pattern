<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountType extends Model
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
    protected $table = 'kng_discount_types';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'discount_type_id';


    /**
     * @var array
     */
    protected $fillable = [
        'discount_type_id',
        'name',
        'status'
    ];


    /**
     * Get the Discount form the Discount type.
     */
    public function Discount()
    {
        return $this->hasMany('App\Models\Discount','discount_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class,'kng_discounttype_store','discount_type_id','store_id')->withTimestamps();
    }
}
