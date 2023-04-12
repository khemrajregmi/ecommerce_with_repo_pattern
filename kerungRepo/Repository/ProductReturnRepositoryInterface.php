<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/01/16
 * Time: 03:00 PM
 */

namespace KerungRepo\Repository;


/**
 * Interface Return
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface ProductReturnRepositoryInterface
{


	/**
     * @param $user
     * @return mixed
     */
    public function getStoreWithReturnAccToUser($user);

    /**
     * @param $data
     * @param $return
     * @return mixed
     */
    public function storeReturnInStores($data,$return);

     /**
     * @param $data
     * @return mixed
     */
    public function getFilterReturnReport($data);
}