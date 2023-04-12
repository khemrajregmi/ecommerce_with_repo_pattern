<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/27/16
 * Time: 9:09 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface WishListRepositoryInterface
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface WishListRepositoryInterface
{
	/**
     * @param $productId
     * @return mixed
     */
    public function destroyById($productId);

    

    /**
     * @param $customer
     * @param $product
     * @return mixed
     */
    public function storeCustomerWishList($product, $customer);


    /**
     * @param $customer
     * @param $product
     * @return mixed
     */
    public function removeWishList($product, $customer);


}