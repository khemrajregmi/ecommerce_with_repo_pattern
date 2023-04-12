<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
     /**
     * @var string
     */
    protected $table = 'kng_product_attributes';


    protected  $primaryKey = 'product_attribute_id';

    /**
     * @var array
     */
    protected $fillable = [
        'product_id',
        'attribute_id',
        'text'
    ];


    /**
     * @return $this
     */
    public function Product()
    {
        return $this->belongsToMany(Product::class,'kng_product_attribute')->withPivot('text');
    }
}
