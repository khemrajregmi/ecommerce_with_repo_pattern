<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 11/15/16
 * Time: 10:01 AM
 */

namespace KerungRepo\Repository;


interface ComboTypeRepositoryInterface
{
	/**
     * @param $data
     * @param $combotype
     * @return mixed
     */
    public function storeComboTypeInStores($data,$combotype);


    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithComboTypeAccToUser($user);
}