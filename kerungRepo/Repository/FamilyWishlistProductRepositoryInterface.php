<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 12/12/16
 * Time: 08:35 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface FamilyWishlistProduct
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface FamilyWishlistProductRepositoryInterface
{	
	/**
     * @param $id
     * @return mixed
     */
	public function checkProductIfExit($id);


	/**
     * @param $id
     * @return mixed
     */
	public function getWishlitAccToFamilySizeId($id);
}