<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockStatus extends Model
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
    protected $table = 'kng_stock_statuses';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'stock_status_id';

    /**
     * Fillable Data
     * 
     * @var array
     */
    protected $fillable = ['name'];


}
