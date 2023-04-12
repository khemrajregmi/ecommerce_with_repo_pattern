<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/01/16
 * Time: 02:00 PM
 */

namespace KerungRepo\Repository;


/**
 * Interface Voucher 
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface VoucherRepositoryInterface
{

	/**
     * @param $data
     * @param $voucher
     * @return mixed
     */
    public function storeVoucherInStores($data,$voucher);


    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithVoucherAccToUser($user);
}