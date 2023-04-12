<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 10:00 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface OrderRepositoryInterface
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface OrderRepositoryInterface
{
	/**
     * @param $orders
     * @return mixed
     */
    public function create($orders);

    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithOrderAccToUser($user);

     /**
     * @param $data
     * @param $order
     * @return mixed
     */
    public function storeOrderInStores($data,$order);

    /**
     * @param $id
     * @param $order
     * @return mixed
     */
    public function getStoreName($id,$order);

    /**
     * @param $id
     * @return mixed
     */
    public function getOrderByCustomerID($id);

    /**
     * @param $data
     * @return mixed
     */
    public function getFilterShippingReport($data);

 


}