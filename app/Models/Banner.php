<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
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
    protected $table = 'kng_banners';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'banner_id';

    /**
     * @var array
     */
    protected $fillable = [
        'banner_id',
        'name',
        'status'
    ];
}
