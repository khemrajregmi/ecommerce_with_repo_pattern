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
interface ProductImageRepositoryInterface
{


    /**
     * @param $productImages
     * @param $productId
     * @return mixed
     */
    public function storeProductImages($productImages,$productId);
    /**
     * @param $productId
     * @return mixed
     */
    public function getProductImagesByProductId($productId);


    public function updateProductImages($productImages,$productId);
}