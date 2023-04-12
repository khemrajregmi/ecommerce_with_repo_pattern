<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 10:00 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface DiscountRepository
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface DiscountRepositoryInterface
{
	/**
     * @param $productId
     * @param $discount
     * @return mixed
     */
    public function storeDiscountPorduct($productId,$discount);

    
    /**
     * @param $categoryId
     * @param $discount
     * @return mixed
     */
    public function storeDiscountCategory($categoryId,$discount);


    /**
     * @param $storeId
     * @param $discount
     * @return mixed
     */
    public function storeDiscountStore($storeId,$discount);

    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithDiscountAccToUser($user);
}