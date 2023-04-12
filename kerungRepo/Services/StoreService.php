<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/8/16
 * Time: 10:48 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\StoreRepositoryInterface;

/**
 * Class StoreService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class StoreService extends BaseService
{
    /**
     * StoreService constructor.
     * @param StoreRepositoryInterface $repo
     */
    public function __construct(StoreRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
    

    /**
     * Get Store Name By Store Id
     *
     * @param $storeId
     * @return mixed
     */
    public function getStoreNameByStoreId($storeId)
    {
        return $this->repo->getStoreNameByStoreId($storeId);
    }


    /**
     * Get Store With City And Area
     *
     * @return mixed
     */
    public function getStoreWithCityAndArea()
    {
        return $this->repo->getStoreWithCityAndAreaAccToUser();
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getStoreAccToUser($user)
    {
        return $this->repo->getStoreAccToUser($user);
    }

    public function getProductByStoreId($storeId)
    {
        return $this->repo->getProductByStoreId($storeId);
    }

    
}