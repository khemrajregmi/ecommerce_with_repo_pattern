<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 9/07/16
 * Time: 10:00 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface DiscountAttributeRepository
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface DiscountAttributeRepositoryInterface
{
	/**
     * @param $discountAttributes
     * @param $discountId
     * @return mixed
     */
    public function storeDiscountAttributes($discountAttributes,$discountId);

    /**
     * @param $discountAttributes
     * @param $discountId
     * @return mixed
     */
    public function updateDiscountAttributes($discountAttributes,$discountId);


    /**
     * @param $id
     * @return mixed
     */
    public function getDiscountAttributes($id);
}