<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/01/16
 * Time: 01:00 PM
 */

namespace KerungRepo\Repository;


/**
 * Interface Voucher Theme
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface VoucherThemeRepositoryInterface
{
	/**
     * @param $data
     * @param $voucher
     * @return mixed
     */
    public function storeVoucherThemeInStores($data,$vouchertheme);


    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithVoucherThemeAccToUser($user);
}