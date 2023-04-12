<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatus extends Model
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
    protected $table = 'kng_order_statuses';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'order_status_id';

    /**
     * @var array
     */
    protected $fillable = [
        'order_status_id',
        'name',
        'language'
    ];

    public function order()
    {
        return $this->belongsTo('Kerung\Models\Order');
    }

    public function getName()
    {
        return $this->name;
    }
}
