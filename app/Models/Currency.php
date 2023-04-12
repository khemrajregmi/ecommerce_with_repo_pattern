<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    /**
     * @var string
     */
    protected $table = 'kng_currencies';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'currency_id';
}
