<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 12/07/16
 * Time: 08:35 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface ProductRelated
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface ProductRelatedRepositoryInterface
{
	/**
     * @param $relatedproduct_data
     * @param $productId
     * @return mixed
     */
	public function storeRelatedProduct($relatedproduct_data,$productId);

	/**
     * @param $id
     * @return mixed
     */
	public function getRelatedProductId($id);
}