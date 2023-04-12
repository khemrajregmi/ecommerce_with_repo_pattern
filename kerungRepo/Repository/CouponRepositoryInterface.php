<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/2/16
 * Time: 10:36 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface CouponRepositoryInterface
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface CouponRepositoryInterface
{
	
    /**
     * @param $data
     * @param $coupon
     * @return mixed
     */
    public function storeCouponCategory($data,$coupon);

    /**
     * @param $data
     * @param $coupon
     * @return mixed
     */
    public function storeCouponProduct($data,$coupon);

    /**
     * @param $data
     * @param $coupon
     * @return mixed
     */
    public function storeCouponInStores($data,$coupon);


    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithCouponAccToUser($user);

     /**
     * @param $data
     * @return mixed
     */
    public function getFilterCouponReport($data);
}