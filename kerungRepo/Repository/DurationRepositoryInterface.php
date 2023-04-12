<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 12/12/16
 * Time: 10:00 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface Duration
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface DurationRepositoryInterface
{

	/**
     * @param $data
     * @param $duration
     * @return mixed
     */
    public function storeDurationInStores($data,$duration);


    /**
     * @param $user
     * @return mixed
     */
    public function getStoreWithDurationAccToUser($user);
}