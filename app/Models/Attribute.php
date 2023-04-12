<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
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
    protected $table = 'kng_attributes';
    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'attribute_id';

     protected $guarded = ['attribute_group_id'];

    /**
     * @var array
     */
    protected $fillable = [
        'attribute_id',
        'name',
        'attribute_group_id'
    ];

    /**
     * Relation With Attribute Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attributeGroup()
    {
        return $this->belongsTo('Kerung\Models\AttributeGroup');
    }
}
