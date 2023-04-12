<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoucherTheme extends Model
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
    protected $table = 'kng_voucher_themes';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'voucher_theme_id';


    /**
     * @var array
     */
    protected $fillable = [
        'voucher_theme_id',
        'name',
        'image'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class,'kng_voucher_theme_store','voucher_theme_id','store_id')->withTimestamps();
    }
}
