<?php

namespace Kerung\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerImage extends Model
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
    protected $table = 'kng_banner_images';

    protected $guarded = ['banner_id'];

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'banner_image_id';

    /**
     * @var array
     */
    protected $fillable = [
        'banner_image_id',
        'banner_id',
        'language_id',
        'title',
        'link',
        'image',
        'sort_order'
    ];
}
