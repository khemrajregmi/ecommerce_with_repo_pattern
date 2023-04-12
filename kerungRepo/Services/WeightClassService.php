<?php
/**
 * Created by PhpStorm.
 * User: drudge
 * Date: 9/2/16
 * Time: 9:09 AM
 */

namespace KerungRepo\Services;


use KerungRepo\Repository\LengthClassRepositoryInterface;
use KerungRepo\Repository\WeightClassRepositoryInterface;

/**
 * Class WeightClassService
 * @package KerungRepo\Services
 * @author Khem Raj Regmi <khemrr067@gmail.com>
 */
class WeightClassService extends BaseService
{

    /**
     * WeightClassService constructor.
     * @param WeightClassRepositoryInterface $repo
     */
    public function __construct(WeightClassRepositoryInterface $repo)
    {
       $this->repo = $repo;
    }
}