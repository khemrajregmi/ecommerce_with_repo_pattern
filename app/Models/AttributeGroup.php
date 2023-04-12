<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeGroup extends Model
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
    protected $table = 'kng_attribute_groups';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'attribute_group_id';


    /**
     * @var array
     */
    protected $fillable = [
        'attribute_group_id',
        'name'
    ];
}
