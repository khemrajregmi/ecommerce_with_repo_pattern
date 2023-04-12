<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 12/12/16
 * Time: 08:35 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface FamilyWishlist
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface FamilyWishlistRepositoryInterface
{	
	/**
     * @param $customerId
     * @return mixed
     */
	public function checkOldWishlist($customerId);

	/**
     * @param $customerId
     * @return mixed
     */
	// public function getFamilySizeId($customerId);
}