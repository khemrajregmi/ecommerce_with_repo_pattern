<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
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
    protected $table = 'kng_vouchers';


    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'voucher_id';


    /**
     * @var array
     */
    protected $fillable = [
        'voucher_id',
        'order_id',
        'code',
        'from_name',
        'from_email',
        'to_email',
        'to_name',
        'voucher_theme_id',
        'message',
        'amount',
        'status'
    ];

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class,'kng_voucher_store','voucher_id','store_id')->withTimestamps();
    }
}
