<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/06/16
 * Time: 40:00 PM
 */

namespace KerungRepo\Repository;


/**
 * Interface Return
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface ProductDiscountRepositoryInterface
{

    /**
     * @param $productDiscounts
     * @param $productId
     * @return mixed
     */
    public function storeProductDiscounts($productDiscounts,$productId);


    /**
     * @param $productId
     * @return mixed
     */
    public function getProductDiscountsByProductId($productId);


    /**
     * @param $productDiscounts
     * @param $productId
     * @return mixed
     */
    public function updateProductDiscounts($productDiscounts,$productId);
}