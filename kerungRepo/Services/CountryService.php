<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/06/16
 * Time: 01:00 PM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\CountryRepositoryInterface;

/**
 * Class CountryService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class CountryService extends BaseService
{
	/**
     * CountryService constructor.
     * @param CountryRepositoryInterface $repo
     */
	
    public function __construct(CountryRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}