<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/5/16
 * Time: 10:34 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\SettingRepositoryInterface;

/**
 * Class SettingService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class SettingService extends BaseService
{
    /**
     * SettingService constructor.
     * @param SettingRepositoryInterface $repo
     */
    public function __construct(SettingRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Update Settings Data
     *
     * @param $code
     * @param $data - array
     * @return mixed
     */
    public function updateSettingByCode($code,$data)
    {
        unset($data['_token']);
        return $this->repo->updateSettingByCode($code,$data);
    }

    /**
     * Get Setting By Code
     *
     * @param $code
     * @return mixed
     */
    public function getSettingByCode($code)
    {
     return $this->repo->getSettingByCode($code);
    }


    /**
     * Get Setting By Code And Key
     * 
     * @param $code
     * @param $key
     * @return mixed
     */
    public function getSettingByCodeAndKey($code,$key)
    {
        return $this->repo->getSettingByCodeAndKey($code,$key);
    }

}