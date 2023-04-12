<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/06/16
 * Time: 01:00 PM
 */

namespace KerungRepo\Repository;


/**
 * Interface State
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface StateRepositoryInterface
{

	/**
	 * Get All State By Country Id
	 * 
	 * @param $countryId
	 * @return mixed
	 */
	public function getAllStatesByCountryId($countryId);
}