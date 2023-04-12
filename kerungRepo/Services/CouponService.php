<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/2/16
 * Time: 10:39 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\CouponRepositoryInterface;

/**
 * Class CouponService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class CouponService extends BaseService
{
    /**
     * CouponService constructor.
     * @param CouponRepositoryInterface $repo
     */
    public function __construct(CouponRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
        $coupons = array(
        'name'=>$data['name'],
        'code'=>$data['code'],
        'type'=>$data['type'],
        'discount'=>$data['discount'],
        'total'=>$data['total'],
        'logged'=>$data['logged'],
        'shipping'=>$data['shipping'],
        'date_start'=>$data['date_start'],
        'date_end'=>$data['date_end'],
        'uses_total'=>$data['uses_total'],
        'uses_customer'=>$data['uses_customer'],
        'status'=>$data['status']
        );

        $coupon =  $this->repo->create($coupons);
        if(isset($data['store'])){
            $this->repo->storeCouponInStores($data['store'],$coupon);
        }
        if(isset($data['product_id'])){
            $this->repo->storeCouponProduct($data['product_id'],$coupon);
        }
        if(isset($data['category_id'])){
            $this->repo->storeCouponCategory($data['category_id'],$coupon);
        }
        return true;
    }


     /**
     * @param $productId
     * @param array $data
     * @return bool
     */
    public function update($couponId,array $data)
    {
        $coupons = array(
        'name'=>$data['name'],
        'code'=>$data['code'],
        'type'=>$data['type'],
        'discount'=>$data['discount'],
        'total'=>$data['total'],
        'logged'=>$data['logged'],
        'shipping'=>$data['shipping'],
        'date_start'=>$data['date_start'],
        'date_end'=>$data['date_end'],
        'uses_total'=>$data['uses_total'],
        'uses_customer'=>$data['uses_customer'],
        'status'=>$data['status']
        );

	    if($this->repo->update($couponId,$coupons))
	    {
        if(isset($data['store'])){
            $coupon = $this->repo->findById($couponId);
            $this->repo->storeCouponInStores($data['store'],$coupon);
        }
        if(isset($data['product_id'])){
            $coupon = $this->repo->findById($couponId);
            $this->repo->storeCouponProduct($data['product_id'],$coupon);
        }
        if(isset($data['category_id'])){
             $coupon = $this->repo->findById($couponId);
             $this->repo->storeCouponCategory($data['category_id'],$coupon);
        }
        }
        return true;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithCouponAccToUser($user)
    {
        return $this->repo->getStoreWithCouponAccToUser($user);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function getFilterCouponReport($data)
    {
      return $this->repo->getFilterCouponReport($data);
    }

}