<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 8/31/16
 * Time: 10:48 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface ManufacturerRepositoryInterface
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface ManufacturerRepositoryInterface
{
	/**
     * @param $data
     * @param $manufacuturer
     * @return mixed
     */
    public function storeManufacturerInStores($data,$manufacuturer);


    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithManufacturerAccToUser($user);
}