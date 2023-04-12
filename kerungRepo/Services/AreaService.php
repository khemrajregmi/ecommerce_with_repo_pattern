<?php
/**
 * Created by Sublime.
 * User: Khem
 * Date: 10/20/16
 * Time: 08:30 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\AreaRepositoryInterface;
use KerungRepo\Repository\CityRepositoryInterface;

/**
 * Class AreaService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class AreaService extends BaseService
{


    /**
     * @var CityRepositoryInterface
     */
    protected $cityRepo;

    /**
     * AreaService constructor.
     *
     * @param AreaRepositoryInterface $repo
     * @param CityRepositoryInterface $cityRepo
     */
    public function __construct(AreaRepositoryInterface $repo,
    							CityRepositoryInterface $cityRepo)
    {
        $this->repo = $repo;
        $this->cityRepo = $cityRepo;
    }

    /**
     * Get the City List
     * @param $code 
     */
    public function getAllCityByStateId($code)
    {
		return $this->cityRepo->getAllCityByStateId($code);
    }

    /**
     * Get All Area By City Id
     * 
     * @param $cityId
     * @return mixed
     */
    public function getAllAreaByCityId($cityId)
    {
        return $this->repo->getAllAreaByCityId($cityId);
    }

}