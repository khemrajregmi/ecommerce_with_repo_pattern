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
interface ProductAttributeRepositoryInterface
{

    /**
     * @param $productAttributes
     * @param $productId
     * @return mixed
     */
    public function storeProductAttributes($productAttributes,$productId);

    /**
     * @param $productAttributes
     * @param $productId
     * @return mixed
     */
    public function updateProductAttributes($productAttributes,$productId);

    /**
     * @param $productId
     * @return mixed
     */
    public function getProductAttributesByProductId($productId);
}