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
 * Class ComboType
 * @package Kerung\Models
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class ComboType extends Model
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
    protected $table = 'kng_combo_types';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'combo_type_id';

    /**
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class,'kng_combotype_store','combo_type_id','store_id')->withTimestamps();
    }
}
