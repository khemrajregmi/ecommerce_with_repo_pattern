<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 8/26/16
 * Time: 8:24 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface ProductRepositoryInterface
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface ProductRepositoryInterface
{


    /****
     * ============================================
     *
     * Admin/Backend/Dashboard Related Methods starts from here
     *
     * ===========================================
     ****/


    /**
     * @param $products
     * @return mixed
     */
    public function create($products);

    /**
     * @param $productId
     * @param $products
     * @return mixed
     */
    public function update($productId,$products);

    /**
     * @param $data
     * @param $product
     * @return mixed
     */
    public function storeProductCategory($data,$product);


    /**
     * @param $data
     * @param $product
     * @return mixed
     */
    public function storeProductInStores($data,$product);
    
    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithProductAccToUser($user);

    /**
     * @param $store
     * @return mixed
     */
    public function getProductAccToStore($store);


    /**
     * @param $quantity
     * @return mixed
     */
    public function minimizeStock($quantity);

    /**
     * @param Old Quantity $oldqty
     * @param $data
     * @return mixed
     */
    public function updateStock($data, $oldqty);

    /**
     * @return mixed
     */
    public function getProductViews();

    /**
     * 
     * @return mixed
     */
    public function getTotalViews();

    /**
     * @param $data
     * @return mixed
     */
    public function getProductInventoryReport($data);

    

    /****
     * ============================================
     *
     * Admin/Backend/Dashboard Related Methods Ends here
     *
     * ===========================================
     ****/


    /****
     * ============================================
     *
     * Frontend Related Methods starts from here
     *
     * ===========================================
     ****/
    /**
     * @return mixed
     */
    public function productPagination();

    public function getProductsWithDiscount($id);

    /**
     * @param $search
     * @return mixed
     */
    public function getBySearch($search);

    /**
     * @param $slug
     * @return mixed
     */
    public function updateViewCount($slug);

    /**
     * @param $category
     * @return mixed
     */
    public function getProductsByCategory($category);
    /****
     * ============================================
     *
     * Frontend Related Methods ends here
     *
     * ===========================================
     ****/




   
    
}