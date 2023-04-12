<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/5/16
 * Time: 10:32 AM
 */

namespace KerungRepo\Repository;

/**
 * Interface SettingRepositoryInterface
 * @package KerungRepo\Repository
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
interface SettingRepositoryInterface
{

    /**
     * @param $code
     * @param $create
     * @return mixed
     */
    public function updateSettingByCode($code,$create);

    /**
     * @param $code
     * @return mixed
     */
    public function getSettingByCode($code);
    /**
     * @param $code
     * @return mixed
     */
    public function getSettingByCodeAndKey($code,$key);
}