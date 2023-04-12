<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * @var string
     */
    protected $table = 'kng_settings';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'setting_id';

    /**
     * Fillable Data
     *
     * @var array
     */
    protected $fillable = [
        'store_id',
        'code',
        'key',
        'value',
        'serialized'
    ];

}
