<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 10:00 AM
 */

namespace KerungRepo\Repository\Eloquent;


use KerungRepo\Repository\Eloquent\BaseEloquentRepository;
use Kerung\Models\Discount;
use KerungRepo\Repository\DiscountRepositoryInterface;

class DiscountEloquentRepository extends BaseEloquentRepository implements DiscountRepositoryInterface
{
    /**
     * DiscountEloquentRepository constructor.
     *  
     * @param Discount $discount
     */
    public function __construct(Discount $discount)
    {
        $this->model = $discount;
    }

    /**
     * @param $productId
     * @param $discount
     * @return mixed
     */
    public function storeDiscountPorduct($productId, $discount)
    {
     return  $discount->Product()->sync($productId);
    }


    /**
     * @param $categoryId
     * @param $discount
     * @return mixed
     */
    public function storeDiscountCategory($categoryId, $discount)
    {
    
     return  $discount->Category()->sync($categoryId);
    }


    /**
     * @param $storeId
     * @param $discount
     * @return mixed
     */
    public function storeDiscountStore($storeId, $discount)
    {
     return  $discount->Store()->sync($storeId);
    }


     /**
     * Get Store With Discount Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithDiscountAccToUser($user)
    {
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['discounts'] = $value->discounts()->get();
            }
            return $stores;
    }
    
}