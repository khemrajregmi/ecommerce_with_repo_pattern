<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 10:00 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface CustomerFamilyType
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface CustomerFamilyTypeRepositoryInterface
{
    /**
     * @param $data
     * @param $familyType
     * @return mixed
     */
    public function storeCustomerFamilyTypeInStores($data,$familyType);


    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithCustomerFamilyTypeAccToUser($user);
}