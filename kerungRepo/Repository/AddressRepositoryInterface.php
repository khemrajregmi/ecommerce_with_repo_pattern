<?php
/**
 * Created by PhpStorm.
 * User: krr
 * Date: 1/20/17
 * Time: 3:15 PM
 */

namespace KerungRepo\Repository;

/**
 * Interface AddressRepositoryInterface
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface AddressRepositoryInterface
{

	/**
     * @param $id
     * @return mixed
     */
    public function getAddressByCustomerID($id);
}