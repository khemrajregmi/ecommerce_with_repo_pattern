<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/8/16
 * Time: 10:41 AM
 */

namespace KerungRepo\Repository;


interface StoreRepositoryInterface
{

    /**
     * @param $storeId
     * @return mixed
     */
    public function getStoreNameByStoreId($storeId);

    /**
     * Get Store with city and area
     *
     * @return mixed
     */
    public function getStoreWithCityAndAreaAccToUser();

    /**
     * @param $user
     * @return mixed
     */
    public function getStoreAccToUser($user);


    public function getProductByStoreId($storeId);
    
}