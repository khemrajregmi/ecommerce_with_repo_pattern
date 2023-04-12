<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/19/16
 * Time: 10:35 AM
 */

namespace KerungRepo\Repository;


/**
 * Interface CityRepositoryInterface
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface CityRepositoryInterface
{
	 /**
     * Get All City By State Id
	  *
     * @param $stateId
     */
	public function getAllCityByStateId($stateId);
}