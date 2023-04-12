<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 12/12/16
 * Time: 11:05 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\OrderProductRepositoryInterface;

/**
 * Class OrderProductService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class OrderProductService extends BaseService
{

    /**
     * OrderProductService constructor.
     * @param OrderProductRepositoryInterface $orderProductRepositoryInterface
     */
    public function __construct(OrderProductRepositoryInterface $orderProductRepositoryInterface)
    {
       $this->repo = $orderProductRepositoryInterface;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getByOrderID($id)
    {
        return $this->repo->getByOrderID($id);
    }


     /**
     * Get Total Price And Quantity
     * @param $data
     * @return mixed
     */
    public function getFilterSalesReport($data)
    {
        return $this->repo->getFilterSalesReport($data);
    }


    /**
     * Get Total Price And Quantity
     * @param $id
     * @return mixed
     */
    public function getProductPurchaseReport($data)
    {
        return $this->repo->getProductPurchaseReport($data);
    }
}