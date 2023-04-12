<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/01/16
 * Time: 03:00 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\ProductReturnRepositoryInterface;
use KerungRepo\Services\BaseService;

/**
 * Class ProductReturnService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class ProductReturnService extends BaseService
{
	/**
     * ProductReturnService constructor.
     * @param ProductReturnRepositoryInterface $repo
     */
	
    public function __construct(ProductReturnRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithReturnAccToUser($user)
    {
        return $this->repo->getStoreWithReturnAccToUser($user);
    }

     /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
        $product_returns = array(
                'order_id'=>$data['order_id'],
                'date_ordered'=>$data['date_ordered'],
                'customer_id'=>$data['customer_id'],
                'firstname'=>$data['firstname'],
                'lastname'=>$data['lastname'],
                'email'=>$data['email'],
                'telephone'=>$data['telephone'],
                'product_id'=>$data['product_id'],
                'model'=>$data['model'],
                'quantity'=>$data['quantity'],
                'product_return_reason_id'=>$data['product_return_reason_id'],
                'opened'=> $data['opened'],
                'comment'=>$data['comment'],
                'product_return_action_id'=>$data['product_return_action_id'],
                'product_return_status_id'=>$data['product_return_status_id']
                );
        $product_return =  $this->repo->create($product_returns);
        $this->repo->storeReturnInStores($data['store'],$product_return);
        return true;
    }


     /**
     * @param $returnId
     * @param array $data
     * @return bool
     */
    public function update($returnId,array $data)
    {
        $product_returns = array(
                'order_id'=>$data['order_id'],
                'date_ordered'=>$data['date_ordered'],
                'customer_id'=>$data['customer_id'],
                'firstname'=>$data['firstname'],
                'lastname'=>$data['lastname'],
                'email'=>$data['email'],
                'telephone'=>$data['telephone'],
                'product_id'=>$data['product_id'],
                'model'=>$data['model'],
                'quantity'=>$data['quantity'],
                'product_return_reason_id'=>$data['product_return_reason_id'],
                'opened'=> $data['opened'],
                'comment'=>$data['comment'],
                'product_return_action_id'=>$data['product_return_action_id'],
                'product_return_status_id'=>$data['product_return_status_id']
                );

    $this->repo->update($returnId,$product_returns);
    $product_return  = $this->repo->findById($returnId);
    $this->repo->storeReturnInStores($data['store'],$product_return);
    return true;
    }


    /**
     * @param $data
     * @return mixed
     */
    public function getFilterReturnReport($data)
    {
      return $this->repo->getFilterReturnReport($data);
    }

}
