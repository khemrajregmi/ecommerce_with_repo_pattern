<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Manufacturer
 * @package Kerung\Models
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class Manufacturer extends Model
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
    protected $table = 'kng_manufacturers';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'manufacturer_id';

    /**
     * Fillable Data
     *
     * @var array
     */
    protected $fillable = ['name','image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class,'kng_manufacturer_store','manufacturer_id','store_id')->withTimestamps();
    }

}
