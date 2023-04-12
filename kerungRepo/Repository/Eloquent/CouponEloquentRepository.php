<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/2/16
 * Time: 10:37 AM
 */

namespace KerungRepo\Repository\Eloquent;

use Carbon\Carbon;
use Kerung\Models\Coupon;
use KerungRepo\Repository\CouponRepositoryInterface;

/**
 * Class CouponEloquentRepository
 * @package KerungRepo\Repository\Eloquent
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class CouponEloquentRepository extends BaseEloquentRepository implements CouponRepositoryInterface
{
    /**
     * CouponEloquentRepository constructor.
     * @param Coupon $coupon
     */
    public function __construct(Coupon $coupon)
    {
        $this->model = $coupon;
    }

    /**
     * @param $categoryId
     * @param $coupon
     * @return mixed
     */
    public function storeCouponCategory($categoryId, $coupon)
    {
     return  $coupon->Category()->sync($categoryId);
    }

    /**
     * @param $productId
     * @param $coupon
     * @return mixed
     */
    public function storeCouponProduct($productId, $coupon)
    {
     return  $coupon->Product()->sync($productId);
    }

    /**
     * @param $couponId
     * @param $coupon
     * @return mixed
     */
    public function storeCouponInStores($couponId, $coupon)
    {
     return  $coupon->Store()->sync($couponId);
    }


    /**
     * Get Store With Coupons Acc To User
     *
     * @param $user
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStoreWithCouponAccToUser($user)
    {
            $stores = $user->Store()->get();
            foreach($stores as $key=>$value)
            {
                $stores[$key]['coupons'] = $value->coupons()->get();
            }
            return $stores;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function getFilterCouponReport($data)
    {
        return $this->model
                        ->whereBetween('created_at', [Carbon::parse($data['start_date'])->format('Y-m-d'), Carbon::parse($data['end_date'])->format('Y-m-d')])
                        ->get();
    }
}