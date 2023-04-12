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
interface FeatureProductRepositoryInterface
{
    /**
     * @param $products
     * @return mixed
     */
    public function storeData($products);
}