<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{

    /**
     * @var string
     */
    protected $table = 'kng_order_history';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'order_history_id';

    /**
     * Fill able Data
     *
     * @var array
     */
    protected $fillable = [
            'order_history_id',
            'order_id',
            'order_status_id',
            'notify',
            'comment'
        ];
}
