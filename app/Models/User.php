<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/21/16
 * Time: 10:30 AM
 */

namespace Kerung\Models;

use Cartalyst\Sentinel\Users\EloquentUser as CartalystUser;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends CartalystUser
{
    use SoftDeletes;
    protected $fillable = [
          'email',
          'password',
          'image',
          'first_name',
          'last_name',
          'permission',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Store()
    {
        return $this->belongsToMany(Store::class,'kng_store_user','user_id','store_id')->withTimestamps();
    }

}