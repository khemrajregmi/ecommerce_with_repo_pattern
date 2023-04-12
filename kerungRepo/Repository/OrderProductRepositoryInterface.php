<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 12/12/16
 * Time: 11:01 AM
 */

namespace KerungRepo\Repository;

/**
 * Interface OrderProductRepositoryInterface
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface OrderProductRepositoryInterface
{

    /**
     * @param $data
     * @param $order
     * @param $cartTotal
     * @return mixed
     */
    public function storeOrderedProducts($data,$order,$cartTotal);

    /**
     * @param $id
     * @return mixed
     */
    public function getByOrderID($id);

    /**
     * @return mixed
     */
    public function getFilterSalesReport($data);

    /**
     * @param $data
     * @return mixed
     */
    public function getProductPurchaseReport($data);

}