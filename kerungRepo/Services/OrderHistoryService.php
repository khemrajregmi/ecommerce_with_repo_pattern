<?php
/**
 * Created by Sublime.
 * User: khem
 * Date: 12/12/19
 * Time: 11:05 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\OrderHistoryRepositoryInterface;

/**
 * Class OrderHistoryService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class OrderHistoryService extends BaseService
{

    /**
     * OrderHistoryService constructor.
     * @param OrderHistoryRepositoryInterface $orderHistoryRepositoryInterface
     */
    public function __construct(OrderHistoryRepositoryInterface $orderHistoryRepositoryInterface)
    {
       $this->repo = $orderHistoryRepositoryInterface;
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
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
        $ordersHistory = array(
                        'order_id'=>$data['order_id'],
                        'order_status_id'=>$data['order_status_id'],
                        'notify'=>$data['notify'],
                        'comment'=>$data['comment']
                        );
        $this->repo->create($ordersHistory);
    }
}