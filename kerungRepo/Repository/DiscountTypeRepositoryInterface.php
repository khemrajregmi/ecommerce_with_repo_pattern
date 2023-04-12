<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 10:00 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface DiscountTypeRepository
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface DiscountTypeRepositoryInterface
{
	/**
     * @param $data
     * @param $manufacuturer
     * @return mixed
     */
    public function storeDiscountTypeInStores($data,$manufacuturer);


    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithDiscountTypeAccToUser($user);
}