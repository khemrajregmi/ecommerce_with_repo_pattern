<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/19/16
 * Time: 10:30 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\CityRepositoryInterface;
use KerungRepo\Repository\StateRepositoryInterface;


/**
 * Class CityService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */

class CityService extends BaseService
{

    /**
     * @var StateRepositoryInterface
     */
    protected $stateRepo;

    /**
     * CityService constructor.
     * @param CityRepositoryInterface $repo
     * @param StateRepositoryInterface $stateRepo
     */
    public function __construct(CityRepositoryInterface $repo,
                                StateRepositoryInterface $stateRepo)
    {
        $this->repo = $repo;
        $this->stateRepo = $stateRepo;
    }


    /**
     * Get All States By Country Id
     * @param $countryId
     * @return mixed
     */
    public function getAllStatesByCountryId($countryId)
    {
		return $this->stateRepo->getAllStatesByCountryId($countryId);
    }
}