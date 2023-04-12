<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 10:00 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface CustomerGroup
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface CustomerGroupRepositoryInterface
{

	/**
     * @param $data
     * @param $customergroup
     * @return mixed
     */
    public function storeCustomerGroupInStores($data,$customergroup);


    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithCustomerGroupAccToUser($user);
}