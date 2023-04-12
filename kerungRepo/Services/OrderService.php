<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/13/16
 * Time: 12:00 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\OrderProductRepositoryInterface;
use KerungRepo\Repository\OrderRepositoryInterface;
use KerungRepo\Repository\OrderHistoryRepositoryInterface;
use KerungRepo\Repository\ProductRepositoryInterface;
use KerungRepo\Services\BaseService;
use Request;
/**
 * Class OrderService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class OrderService extends BaseService

{
    /**
     * @var OrderProductRepositoryInterface
     */
    protected $orderProduct;

    /**
     * @var OrderHistoryRepositoryInterface
     */
    protected $orderHistory;

    /**
     * @var ProductRepositoryInterface
     */
    protected $product;

    /**
     * OrderService constructor.
     * @param OrderRepositoryInterface $repo
     * @param OrderProductRepositoryInterface $orderProductRepositoryInterface
     */
    public function __construct(OrderRepositoryInterface $repo,
        OrderProductRepositoryInterface $orderProductRepositoryInterface,
        OrderHistoryRepositoryInterface $orderHistoryRepositoryInterface,
        ProductRepositoryInterface $productRepositoryInterface)
    {
        $this->repo = $repo;
        $this->orderProduct = $orderProductRepositoryInterface;
        $this->orderHistory = $orderHistoryRepositoryInterface;
        $this->product = $productRepositoryInterface;
    }


    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithOrderAccToUser($user)
    {
        return $this->repo->getStoreWithOrderAccToUser($user);
    }



    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
        // dd($data);
            $a=$data['total'];
            if(is_numeric($a))
                $a = str_replace(',','', $a);
                // echo trim($a,'');
        $orders = array(
                        'invoice_no'=>0,
                        'invoice_prefix'=>'INV-'.date('Y').'-00',
                        'firstname'=>$data['firstname'],
                        'lastname'=>$data['lastname'],
                        'fax'=>$data['fax'],
                        'telephone'=>$data['telephone'],
                        'email'=>$data['email'],
                        'shipping_firstname'=>$data['shipping_firstname'],
                        'shipping_lastname'=>$data['shipping_lastname'],
                        'shipping_company'=>$data['shipping_company'],
                        'shipping_address_1'=>$data['shipping_address_1'],
                        'shipping_address_2'=>$data['shipping_address_2'],
                        'shipping_country_id' => $data['shipping_country_id'],
                        'shipping_state_id' => $data['shipping_state_id'],
                        'shipping_city_id' => $data['shipping_city_id'],
                        'shipping_area_id' => $data['shipping_area_id'],
                        'payment_firstname' =>$data['payment_firstname'],
                        'payment_lastname' =>$data['payment_lastname'],
                        'payment_company' =>$data['payment_company'],
                        'payment_address_1' =>$data['payment_address_1'],
                        'payment_address_2' =>$data['payment_address_2'],
                        'payment_country_id' => $data['payment_country_id'],
                        'payment_state_id' => $data['payment_state_id'],
                        'payment_city_id' => $data['payment_city_id'],
                        'payment_area_id' => $data['payment_area_id'],
                        'order_status_id'=>$data['order_status_id'],
                        'customer_group_id'=>$data['customer_group_id'],
                        'customer_id'=>$data['customer_id'],
                        'total'=>$data['total'],
                        'ip'=>$data['ip'],
                        'user_agent'=>$data['user_agent'],
                        'payment_method'=>$data['payment_method']
                        );
        $order =  $this->repo->create($orders);
        $this ->product->minimizeStock($data['product']);
        $this->repo->storeOrderInStores($data['store'],$order);
        $this->orderProduct->storeOrderedProducts($data['product'],$order,$data['total']);
        $this->orderHistory->storeOrderedHistory($data['product'],$order,$data['comment']);
        return true;
    }

    public function frontendCheckout(array $data)
    {
        $data['state_id']=3;
        $data['city_id']=6;
        $data['area_id']=1;
        $data['fax']='';
        $data['payment_firstname']=$data['firstname'];
        $data['payment_lastname']=$data['lastname'];
        $data['payment_company']=$data['company'];
        $data['payment_address_1']=$data['address_1'];
        $data['payment_address_2']=$data['address_2'];
        $data['payment_country_id']=$data['country_id'];
        $data['payment_state_id']=$data['state_id']?$data['state_id']:3;
        $data['payment_city_id']=$data['city_id']?$data['city_id']:6;
        $data['payment_area_id']=$data['area_id']?$data['area_id']:1;
        // $data['fax']=;
        // dd($data);

        // "state_id" => 3,
        //     "city_id" => 6,
        //     "area_id" => 1,
        $data['order_status_id']= 1;
        $data['comment']= ' ';
        if(empty($data['shipping_firstname'])): $data['shipping_firstname'] = $data['firstname']; else: $data['shipping_firstname'] = $data['shipping_firstname']; endif;
        if(empty($data['shipping_lastname'])): $data['shipping_lastname'] = $data['lastname']; else: $data['shipping_lastname'] = $data['shipping_lastname']; endif;
        if(empty($data['shipping_company'])): $data['shipping_company'] = $data['company']; else: $data['shipping_company'] = $data['shipping_company']; endif;
        if(empty($data['shipping_address_1'])): $data['shipping_address_1'] = $data['address_1']; else: $data['shipping_address_1'] = $data['shipping_address_1']; endif;
        if(empty($data['shipping_address_2'])): $data['shipping_address_2'] = $data['address_2']; else: $data['shipping_address_2'] = $data['shipping_address_2']; endif;
        if(empty($data['shipping_country_id'])): $data['shipping_country_id'] = $data['country_id']; else: $data['shipping_country_id'] = $data['shipping_country_id']; endif;
        if(empty($data['shipping_state_id'])): $data['shipping_state_id'] = $data['state_id']; else: $data['shipping_state_id'] = $data['shipping_state_id']; endif;
        if(empty($data['shipping_city_id'])): $data['shipping_city_id'] = $data['city_id']; else: $data['shipping_city_id'] = $data['shipping_city_id']; endif;
        if(empty($data['shipping_area_id'])): $data['shipping_area_id'] = $data['area_id']; else: $data['shipping_area_id'] = $data['shipping_area_id']; endif;
        // dd($data);
       return $this->store($data);
    }


    /**
     * @param $orderId
     * @param array $data
     * @return bool
     */
    public function update($orderId,array $data)
    {    
        $total = $this->makeTotalAsNumerice($data['total']);
        $orders = array(
                        'firstname'=>$data['firstname'],
                        'lastname'=>$data['lastname'],
                        'fax'=>$data['fax'],
                        'telephone'=>$data['telephone'],
                        'email'=>$data['email'],
                        'shipping_firstname'=>$data['shipping_firstname'],
                        'shipping_lastname'=>$data['shipping_lastname'],
                        'shipping_company'=>$data['shipping_company'],
                        'shipping_address_1'=>$data['shipping_address_1'],
                        'shipping_address_2'=>$data['shipping_address_2'],
                        'shipping_country_id' => $data['shipping_country_id'],
                        'shipping_state_id' => $data['shipping_state_id'],
                        'shipping_city_id' => $data['shipping_city_id'],
                        'shipping_area_id' => $data['shipping_area_id'],
                        'payment_firstname' =>$data['payment_firstname'],
                        'payment_lastname' =>$data['payment_lastname'],
                        'payment_company' =>$data['payment_company'],
                        'payment_address_1' =>$data['payment_address_1'],
                        'payment_address_2' =>$data['payment_address_2'],
                        'payment_country_id' => $data['payment_country_id'],
                        'payment_state_id' => $data['payment_state_id'],
                        'payment_city_id' => $data['payment_city_id'],
                        'payment_area_id' => $data['payment_area_id'],
                        'shipping_method'=>$data['shipping_method'],
                        'order_status_id'=>$data['order_status_id'],
                        'customer_group_id'=>$data['customer_group_id'],
                        'customer_id'=>$data['customer_id'],
                        'total'=>$total,
                        'ip'=>$data['ip'],
                        'user_agent'=>$data['user_agent'],
                        'payment_method'=>$data['payment_method']
                        );
    $this->repo->update($orderId,$orders);
    $this ->product->updateStock($data['product'],$data['old_cart_qty']);
    $order = $this->repo->findById($orderId);
    $this->repo->storeOrderInStores($data['store'],$order);
    $this->orderProduct->storeOrderedProducts($data['product'],$order,$data['total']);
    $this->orderHistory->storeOrderedHistory($data['product'],$order,$data['comment']);
    return true;
    }


    /**
     * @param $id
     * @param $order
     * @return mixed
     */
    public function getStoreName($id,$order)
    {
        return $this->repo->getStoreName($id,$order);
    }


    /**
     * @param $orderId
     * @param array $data
     * @return bool
     */
    public function createInvoice($orderId,array $data)
    {
        // dd($data['orderId']);
        $orders = array(
                'invoice_no'=>$orderId
                );
        $this->repo->update($orderId,$orders);
        return true;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOrderByCustomerID($id)
    {
        return $this->repo->getOrderByCustomerID($id);
    }

     /**
     * @param $total
     * @return mixed
     */
    public function makeTotalAsNumerice($total)
    {
      return str_replace(',','', $total);
    }

   
    /**
     * @param $data
     * @return mixed
     */
    public function getFilterShippingReport($data)
    {
      return $this->repo->getFilterShippingReport($data);
    }

}