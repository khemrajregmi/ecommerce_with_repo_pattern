<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 11/15/16
 * Time: 10:05 AM
 */

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ComboOffer
 * @package Kerung\Models
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ComboOffer extends Model
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
    protected $table = 'kng_combo_offers';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'combo_offer_id';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'combo_type_id',
        'combo_name',
        'combo_price',
        'category_id',
        'show_mrp',
        'show_sp',
        'show_cp',
        'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class,'kng_combo_offer_product','combo_id','product_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comboType()
    {
        return $this->belongsTo(ComboType::class,'combo_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class,'kng_combooffer_store','combo_offer_id','store_id')->withTimestamps();
    }
}
