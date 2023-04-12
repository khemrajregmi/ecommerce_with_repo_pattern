<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 8/31/16
 * Time: 03:00 PM
 */

namespace KerungRepo\Repository;


/**
 * Interface Review
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface ReviewRepositoryInterface
{
	/**
     * @param $id
     *
     * @return mixed
     */
	public function getReview($id);

	/**
     * @param $user
     * @return mixed
     */
    public function getStoreWithReviewAccToUser($user);

    /**
     * @param $data
     * @param $review
     * @return mixed
     */
    public function storeReviewInStores($data,$review);

}