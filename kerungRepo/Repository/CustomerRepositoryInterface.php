<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 10:00 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface CustomerRepository
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface CustomerRepositoryInterface
{

	 /**
     * Get product for Wishlist by customer_id
     * @param CustomerID $id
     */
	public function getProductsByCustomerId($id);

	/**
     * @param $data
     * @param $manufacuturer
     * @return mixed
     */
    public function storeCustomerInStores($data,$manufacuturer);


    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithCustomerAccToUser($user);
}