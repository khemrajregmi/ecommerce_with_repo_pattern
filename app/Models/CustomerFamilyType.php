<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerFamilyType extends Model
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
    protected $table = 'kng_customer_family_types';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'customer_family_type_id';

    /**
     * @var array
     */
    protected $fillable = [
        'customer_family_type_id',
        'type_name'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class,'kng_familysize_store','customer_family_type_id','store_id')->withTimestamps();
    }
}

