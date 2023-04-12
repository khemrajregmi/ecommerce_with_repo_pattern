<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 10:00 AM
 */

namespace KerungRepo\Repository\Eloquent;



use Kerung\Models\DiscountType;
use KerungRepo\Repository\DiscountTypeRepositoryInterface;

class DiscountTypeEloquentRepository extends BaseEloquentRepository implements DiscountTypeRepositoryInterface
{
    /**
     * DiscountTypeEloquentRepository constructor.
     *  
     * @param DiscountType $discount_type
     */
    public function __construct(DiscountType $discount_type)
    {
        $this->model = $discount_type;
    }


    /**
     * @param $discounttypeId
     * @param $discounttype
     * @return mixed
     */
    public function storeDiscountTypeInStores($discounttypeId, $discounttype)
    {
     return  $discounttype->Store()->sync($discounttypeId);
    }


    /**
     * Get Store With Discounttype Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithDiscountTypeAccToUser($user)
    {
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['discounttyps'] = $value->discounts()->get();
            }
            return $stores;
    }

    
}