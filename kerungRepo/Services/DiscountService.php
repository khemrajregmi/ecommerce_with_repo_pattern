<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 14/11/16
 * Time: 11:47 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\DiscountRepositoryInterface;
use KerungRepo\Repository\CategoryRepositoryInterface;
use KerungRepo\Repository\DiscountAttributeRepositoryInterface;

/**
 * Class DiscountService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class DiscountService extends BaseService
{

	/**
     * @var ProductCategoryRepositoryInterface
     */
    protected $discountAttributeRepo;

    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepo;

   

    /**
     * DiscountService constructor.
     * @param DiscountRepositoryInterface $repo
     * @param DiscountAttributeRepositoryInterface $discountAttributeRepositoryInterface
     */
    public function __construct(DiscountRepositoryInterface $repo,
				DiscountAttributeRepositoryInterface $discountAttributeRepositoryInterface,
                CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        $this->repo = $repo;
        $this->categoryRepo = $categoryRepositoryInterface;
        $this->discountAttributeRepo = $discountAttributeRepositoryInterface;
    }



    /**
     * @param $id
     * @return mixed
     */
    public function getAllProductByCategoryId($id)
    {
        $categoryId=$id;
    	return $this->categoryRepo->getProductsByCategoryId($categoryId);
    }


     /**
     * @param $id
     * @return mixed
     */
    public function getDiscountAttributes($id)
    {
        $discountId=$id;
        return $this->discountAttributeRepo->getDiscountAttributes($discountId);
    }


    /**
     * @param array $data
     * @return bool
     */
    public function store(array $data)
    {
        $discounts = array(
        'discount_type_id'=>$data['discount_type_id'],
        'name'=>$data['name'],
        'description'=>$data['description']);

        $discount =  $this->repo->create($discounts);
        $this->repo->storeDiscountStore($data['store'],$discount);

        if($data['discount_type_id']==1)
        { 
            $discount_attribute=array(
                'discount_id' => $discount->discount_id,
                'percentage' => $data['product_per_percentage']
                );
            $this->discountAttributeRepo->storeDiscountAttributes($discount_attribute, $discount->discount_id); 
            
            $this->repo->storeDiscountPorduct($data['product_id'],$discount);
            $this->repo->storeDiscountCategory($data['category1'],$discount);
            
        }

        if($data['discount_type_id']==2)
        { 
            $discount_attribute=array(
                'discount_id' => $discount->discount_id,
                'amount' => $data['fixed_price_amount']
                );
            $this->discountAttributeRepo->storeDiscountAttributes($discount_attribute , $discount->discount_id); 

            $this->repo->storeDiscountPorduct($data['product_id'],$discount);
            $this->repo->storeDiscountCategory($data['category_fixprice'],$discount);
        } 
        
        if($data['discount_type_id']==3)
        { 

            $discount_attribute=array(
                'discount_id' => $discount->discount_id,
                'amount' => $data['discount_total_bill_amount'],
                'percentage' =>$data['discount_total_bill_percent']
                );

            
            $this->discountAttributeRepo->storeDiscountAttributes($discount_attribute, $discount->discount_id); 

        }
        
        if($data['discount_type_id']==4)
        { 
            $discount_attribute=array(
                'discount_id' => $discount->discount_id,
                'amount' => $data['priceoff_bundel_amount']
                );
            $this->discountAttributeRepo->storeDiscountAttributes($discount_attribute, $discount->discount_id); 

            // dd($data['category_priceoff']);
            $this->repo->storeDiscountPorduct($data['product_id'],$discount);
            $this->repo->storeDiscountCategory($data['category_priceoff'],$discount);
        }
        
        if($data['discount_type_id']==5)
        { 

            // $this->discountAttributeRepo->storeDiscountAttributes($data['product_per_percentage'], $discount->discount_id); 

            // $this->repo->storeDiscountPorduct($data['product_id'],$discount);
        }
        
        if($data['discount_type_id']==6)
        { 
            $discount_attribute=array(
                'discount_id' => $discount->discount_id,
                'type' => $data['category_discount_type'],
                'amount' => $data['category_discount_amount'],
                'percentage' =>$data['category_discount_percent']
                );
            $this->discountAttributeRepo->storeDiscountAttributes($discount_attribute, $discount->discount_id); 

            $this->repo->storeDiscountCategory($data['categorywise'],$discount);
            
            
        }
        
        if($data['discount_type_id']==7)
        { 
            $discount_attribute=array(
                'discount_id' => $discount->discount_id,
                'type' => $data['bulk_order_type'],
                'amount' => $data['bulk_order_value_amount'],
                'percentage' =>$data['category_discount_percent'],
                'total_min_quantity' => $data['bulk_order_total_qty'],
                'additional_quantity' =>$data['bulk_order_add_qty']
                );
            $this->discountAttributeRepo->storeDiscountAttributes($discount_attribute, $discount->discount_id); 

            
            $this->repo->storeDiscountPorduct($data['product_id'],$discount);
            $this->repo->storeDiscountCategory($data['category_bulkorder'],$discount);
        }
        
        if($data['discount_type_id']==8)
        { 
            $discount_attribute=array(
                'discount_id' => $discount->discount_id,
                'total_min_quantity' => $data['buy_quantity'],
                'additional_quantity' =>$data['get_quantity'],
                'product_id' =>$data['get_product']
                );
            $this->discountAttributeRepo->storeDiscountAttributes($discount_attribute, $discount->discount_id);

            
            $this->repo->storeDiscountPorduct($data['product_id'],$discount);
            $this->repo->storeDiscountCategory($data['category_buy_getoffer'],$discount);
        }
        
        if($data['discount_type_id']==9)
        { 

            
            $this->repo->storeDiscountPorduct($data['product_id'],$discount);
            $this->repo->storeDiscountCategory($data['category_free'],$discount);
        }


        if($data['discount_type_id']==10)
        { 
            $discount_attribute=array(
                'discount_id' => $discount->discount_id,
                'start_at' => $data['start_date'],
                'end_at' =>$data['end_date']
                );
            $this->discountAttributeRepo->storeDiscountAttributes($discount_attribute, $discount->discount_id); 

            
            $this->repo->storeDiscountPorduct($data['product_id'],$discount);
            $this->repo->storeDiscountCategory($data['category'],$discount);
        }
        
        return true;  
    }


    /**
     * @param $discountId
     * @param array $data
     * @return bool
     */
    public function update($discountId,array $data)
    {
         $discounts = array(
        'discount_type_id'=>$data['discount_type_id'],
        'name'=>$data['name'],
        'description'=>$data['description']);

     if($this->repo->update($discountId,$discounts))
     {
        if($data['discount_type_id']==1)
        { 
            $discount_attribute=array(
                'discount_id' => $discountId,
                'percentage' => $data['product_per_percentage']
                );
            $this->discountAttributeRepo->updateDiscountAttributes($discount_attribute, $discountId); 
            $discount = $this->repo->findById($discountId);
            $this->repo->storeDiscountStore($data['store'],$discount);
            $this->repo->storeDiscountPorduct($data['product_id'],$discount);
            $this->repo->storeDiscountCategory($data['category1'],$discount);
            
        }

        if($data['discount_type_id']==2)
        { 
            $discount_attribute=array(
                'discount_id' => $discountId,
                'amount' => $data['fixed_price_amount']
                );
            $this->discountAttributeRepo->updateDiscountAttributes($discount_attribute, $discountId);

            $discount = $this->repo->findById($discountId);
            $this->repo->storeDiscountStore($data['store'],$discount);
            $this->repo->storeDiscountPorduct($data['product_id'],$discount);
            $this->repo->storeDiscountCategory($data['category_fixprice'],$discount);
            
        }

        if($data['discount_type_id']==3)
        { 

            $discount_attribute=array(
                'discount_id' => $discountId,
                'amount' => $data['discount_total_bill_amount'],
                'percentage' =>$data['discount_total_bill_percent']
                );

            $discount = $this->repo->findById($discountId);
            $this->repo->storeDiscountStore($data['store'],$discount);
            $this->discountAttributeRepo->updateDiscountAttributes($discount_attribute, $discountId); 

        }

         if($data['discount_type_id']==4)
        { 
            $discount_attribute=array(
                'discount_id' => $discountId,
                'amount' => $data['priceoff_bundel_amount']
                );
            $this->discountAttributeRepo->updateDiscountAttributes($discount_attribute, $discountId); 

            $discount = $this->repo->findById($discountId);
            $this->repo->storeDiscountStore($data['store'],$discount);
            $this->repo->storeDiscountPorduct($data['product_id'],$discount);
            $this->repo->storeDiscountCategory($data['category_priceoff'],$discount);
        }

        if($data['discount_type_id']==6)
        { 
            $discount_attribute=array(
                'discount_id' => $discountId,
                'type' => $data['category_discount_type'],
                'amount' => $data['category_discount_amount'],
                'percentage' =>$data['category_discount_percent']
                );
            $this->discountAttributeRepo->updateDiscountAttributes($discount_attribute, $discountId); 

            $discount = $this->repo->findById($discountId);
            $this->repo->storeDiscountStore($data['store'],$discount);
            $this->repo->storeDiscountCategory($data['categorywise'],$discount);
            
            
        }

        if($data['discount_type_id']==7)
        { 
            $discount_attribute=array(
                'discount_id' => $discountId,
                'type' => $data['bulk_order_type'],
                'amount' => $data['bulk_order_value_amount'],
                'percentage' =>$data['category_discount_percent'],
                'total_min_quantity' => $data['bulk_order_total_qty'],
                'additional_quantity' =>$data['bulk_order_add_qty']
                );
            $this->discountAttributeRepo->updateDiscountAttributes($discount_attribute, $discountId); 

            $discount = $this->repo->findById($discountId);
            $this->repo->storeDiscountStore($data['store'],$discount);
            $this->repo->storeDiscountPorduct($data['product_id'],$discount);
            $this->repo->storeDiscountCategory($data['category_bulkorder'],$discount);
        }

         if($data['discount_type_id']==8)
        { 
            $discount_attribute=array(
                'discount_id' => $discountId,
                'total_min_quantity' => $data['buy_quantity'],
                'additional_quantity' =>$data['get_quantity'],
                'product_id' =>$data['get_product']
                );
            $this->discountAttributeRepo->updateDiscountAttributes($discount_attribute, $discountId); 


            $discount = $this->repo->findById($discountId);
            $this->repo->storeDiscountStore($data['store'],$discount);
            $this->repo->storeDiscountPorduct($data['product_id'],$discount);
            $this->repo->storeDiscountCategory($data['category_buy_getoffer'],$discount);
        }

         if($data['discount_type_id']==9)
        { 

            $discount = $this->repo->findById($discountId);
            $this->repo->storeDiscountStore($data['store'],$discount);
            $this->repo->storeDiscountPorduct($data['product_id'],$discount);
            $this->repo->storeDiscountCategory($data['category_free'],$discount);
        }

        if($data['discount_type_id']==10)
        { 
            $discount_attribute=array(
                'discount_id' => $discountId,
                'start_at' => $data['start_date'],
                'end_at' =>$data['end_date']
                );
            $this->discountAttributeRepo->updateDiscountAttributes($discount_attribute, $discountId); 

            $discount = $this->repo->findById($discountId);
            $this->repo->storeDiscountStore($data['store'],$discount);
            $this->repo->storeDiscountPorduct($data['product_id'],$discount);
            $this->repo->storeDiscountCategory($data['category'],$discount);
        }
        
    }
        return true;
    }


    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithDiscountAccToUser($user)
    {
        return $this->repo->getStoreWithDiscountAccToUser($user);
    }
}